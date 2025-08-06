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

//     public function test(Request $request) {
//          try {
//             $file = $request->file('file');

//     $reader = SimpleExcelReader::create($file->getPathname(), 'xlsx');

//     // Convert LazyCollection to regular Collection
//     $rows = collect($reader->getRows());
//     $roleMap = [
//             'HR' => 'hr',
//             'Admin' => 'admin',
//             'Manager' => 'manager',
//             'Employee' => 'employee',
//         ];
//     // Remove duplicates by lowercase trimmed 'Names'
//     $unique = $rows->unique(function ($item) {
//         return strtolower(trim($item['Name'] ?? ''));
//     })->values();

//    foreach ($unique as $item) {
//     $userId = trim($item['Employees Code'] ?? null);

//     // Set to null if empty or explicitly zero
//     $userId = ($userId === '' || $userId === '0') ? null : $userId;
//         $user = new User();
//         $roleRaw = trim($item['Department'] ?? '');
//         $mappedRole = $roleMap[$roleRaw] ?? 'employee';
//         $user->user_id = $userId;
//         $user->email = trim($item['Email']);
//         $user->name = trim($item['Name']);
//         $user->role = $mappedRole; // or generate email if required
//         $user->password = bcrypt('snj12345'); // Set a default password
//         $user->addFlag(User::FLAG_ACTIVE);
//         $user->save(); // Save to DB
//     }

//     return response()->json(['message' => 'Users saved successfully.', 'count' => $unique->count()]);

//             // You can iterate over $excelData here to process it further
//             // For example, to print each row:
//             // foreach ($excelData as $rowIndex => $row) {
//             //     // $row is an array of cell values for that row
//             //     echo "Row " . ($rowIndex + 1) . ": " . implode(", ", $row) . "<br>";
//             // }

//             // Store the data in session to display it on the form page
//             return redirect()->back()->with('success', 'Excel file read successfully!')
//                                      ->with('excel_data', $excelData);

//         } catch (\Maatwebsite\Excel\ReaderException $e) {
//             // This catches issues specifically related to the Excel reader (e.g., malformed file)
//             return redirect()->back()->with('error', 'Could not read the Excel file. It might be corrupted or in an unsupported format. Error: ' . $e->getMessage());
//         } catch (Exception $e) {
//             // Catch any other general exceptions
//             return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
//         }
//     }

    public function test()
    {
        $now = Carbon::now();

        // Determine the first and last day of the current month
        $startOfMonth = $now->copy()->startOfMonth()->startOfDay();
        $endOfMonth = $now->copy()->endOfMonth()->endOfDay();

        $zk = new ZKTeco(ip: '192.168.99.48', port: 4370);

        if (!$zk->connect()) {
            return response()->json([
                'status' => false,
                'message' => 'Could not connect to ZKTeco device.'
            ], 500);
        }

        try {
            $attendances = $zk->getAttendances(); // Get all attendance logs
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

    $formattedLogs = $currentMonthLogs->map(function ($log) {
        return [
            'uid'         => $log['uid'],
            'user_id'     => $log['user_id'] ?? null,
            'state'       => $log['state'] ?? null,
            'type'        => $log['type'] ?? null,
            'record_time' => Carbon::parse($log['record_time']),
            'device_ip'   => $log['device_ip'] ?? '192.168.0.38',
            'flags'       => Attendance::FLAG_IMPORTED, 
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    });

 
    Attendance::insert($formattedLogs->toArray());

    return response()->json([
        'status'     => true,
        'year'       => $now->year,
        'month'      => $now->month,
        'month_name' => $now->format('F'),
        'inserted'   => $formattedLogs->count(),
    ]);
    }
}
