<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use CodingLibs\ZktecoPhp\Libs\ZKTeco;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttendanceRequest;
class AttendanceController extends Controller
{
    public function index() {

        return view('admin.attendence.index');
    }
    
    public function create() {
        return view('admin.attendence.create');
    }

     

    public function test()
    {
        $now = Carbon::now();

        $startOfMonth = $now->copy()->startOfMonth()->startOfDay();
        $endOfMonth   = $now->copy()->endOfMonth()->endOfDay();

        $zk = new ZKTeco(ip: '192.168.99.48', port: 4370);

        if (!$zk->connect()) {
            return response()->json([
                'status' => false,
                'message' => 'Could not connect to ZKTeco device.'
            ], 500);
        }

        try {
            $attendances = $zk->getAttendances();
        } catch (\Exception $e) {
            Log::error('ZKTeco Data Fetch Error: ' . $e->getMessage(), [
                'ip' => '192.168.99.48',
                'port' => 4370
            ]);
            $zk->disconnect();
            return response()->json([
                'status' => false,
                'message' => '❌ Error fetching data from ZKTeco device: ' . $e->getMessage()
            ], 500);
        }

        $zk->disconnect();

        $currentMonthLogs = collect($attendances)->filter(function ($log) use ($startOfMonth, $endOfMonth) {
            if (!isset($log['record_time'])) {
                return false;
            }
            $logTime = Carbon::parse($log['record_time']);
            return $logTime->between($startOfMonth, $endOfMonth);
        })->values();

        // Get existing logs from DB for this month to avoid duplicates
        $existingLogs = Attendance::whereBetween('record_time', [$startOfMonth, $endOfMonth])
            ->get()
            ->map(function ($item) {
                return $item->user_id . '|' . $item->record_time->format('Y-m-d H:i:s');
            })
            ->toArray();

        $formattedLogs = $currentMonthLogs->filter(function ($log) use ($existingLogs) {
            $key = ($log['user_id'] ?? '') . '|' . Carbon::parse($log['record_time'])->format('Y-m-d H:i:s');
            return !in_array($key, $existingLogs);
        })->map(function ($log) {
            return [
                'uid'         => $log['uid'],
                'user_id'     => $log['user_id'] ?? null,
                'state'       => $log['state'] ?? null,
                'type'        => $log['type'] ?? null,
                'record_time' => Carbon::parse($log['record_time'])->format('Y-m-d H:i:s'),
                'device_ip'   => $log['device_ip'] ?? '192.168.99.48',
                'flags'       => Attendance::FLAG_IMPORTED, 
                'created_at'  => now()->format('Y-m-d H:i:s'),
                'updated_at'  => now()->format('Y-m-d H:i:s'),
            ];
        });

        if ($formattedLogs->isNotEmpty()) {
            Attendance::insert($formattedLogs->toArray());
        }

        return response()->json([
            'status'     => true,
            'year'       => $now->year,
            'month'      => $now->month,
            'month_name' => $now->format('F'),
            'inserted'   => $formattedLogs->count(),
        ]);
    }
}
