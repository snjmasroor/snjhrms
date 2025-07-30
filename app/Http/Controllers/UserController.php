<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CodingLibs\ZktecoPhp\Libs\ZKTeco;
use Illuminate\Support\Carbon;
use App\Models\Attendance;
class UserController extends Controller
{
   public function test()
    {
         $now = Carbon::now();

        // Determine the first and last day of the current month
        $startOfMonth = $now->copy()->startOfMonth()->startOfDay();
        $endOfMonth = $now->copy()->endOfMonth()->endOfDay();
        $zk = new \CodingLibs\ZktecoPhp\Libs\ZKTeco(ip: '192.168.0.38', port: 4370);

    if (!$zk->connect()) {
        return response()->json([
            'status' => false,
            'message' => '❌ Could not connect to ZKTeco device.'
        ], 500);
    }

    try {
            $attendances = $zk->getAttendances(); // Get all attendance logs
        } catch (\Exception $e) {
            Log::error('ZKTeco Data Fetch Error: ' . $e->getMessage(), [
                'ip' => '192.168.0.38',
                'port' => 4370
            ]);
            $zk->disconnect();
            return response()->json([
                'status' => false,
                'message' => '❌ Error fetching data from ZKTeco device: ' . $e->getMessage()
            ], 500);
        }

        $zk->disconnect();

        // Filter logs for the current month (no user mapping needed)
        $currentMonthLogs = collect($attendances)->filter(function ($log) use ($startOfMonth, $endOfMonth) {
            if (!isset($log['record_time'])) {
                return false; // Skip logs without a record_time
            }
            $logTime = Carbon::parse($log['record_time']);
            return $logTime->between($startOfMonth, $endOfMonth);
        })->values();

        $formattedLogs = $currentMonthLogs->map(function ($log) {
        return [
            'uid'         => $log['uid'],
            'user_id'     => $log['user_id'] ?? null,
            'state'       => $log['state'] ?? null,
            'type'        => $log['type'] ?? null,
            'record_time' => Carbon::parse($log['record_time']),
            'device_ip'   => $log['device_ip'] ?? '192.168.0.38',
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    });

    // ✅ Insert in chunks
    
        Attendance::insert($formattedLogs->toArray());
    

    // ✅ Return response
    return response()->json([
        'status'     => true,
        'year'       => $now->year,
        'month'      => $now->month,
        'month_name' => $now->format('F'),
        'inserted'   => $formattedLogs->count(), // Count inserted records
    ]);

        return response()->json([
            'status' => true,
            'year' => $now->year,
            'month' => $now->month,
            'month_name' => $now->format('F'), // Add month name for user-friendliness
            'logs' => $currentMonthLogs
        ]);
    }
}
