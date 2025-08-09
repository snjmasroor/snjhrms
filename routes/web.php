<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('dashboard');
    }
    elseif (auth()->check() && auth()->user()->role === 'hr') {
        return redirect()->route('dashboard');
    }
    elseif (auth()->check() && auth()->user()->role === 'manager') {
        return redirect()->route('dashboard');
    }
    elseif (auth()->check() && auth()->user()->role === 'employee') {
        return redirect()->route('employee.dashboard');
    }
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    
    
    Route::get('/hr/dashboard', [DashboardController::class, 'hrDashboard'])->name('hr.dashboard');
    Route::get('/project/dashboard', [ProjectController::class, 'projectDashboard'])->name('project.dashboard');

    //settings
    Route::get('/settings', [SettingController::class, 'projectDashboard'])->name('permissions');

    


});

Route::middleware(['auth', 'permission:view.dashboard'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    // View
    Route::middleware('permission:view.attendance')
        ->get('/attendance', [AttendanceController::class, 'index'])
        ->name('attendance.index');

    // Create
    Route::middleware('permission:create.attendance')->get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');

    // Store (write)
    Route::middleware('permission:write.attendance')
        ->post('/attendance', [AttendanceController::class, 'store'])
        ->name('attendance.store');

    // Edit
    Route::middleware('permission:edit.attendance')
        ->get('/attendance/{attendance}/edit', [AttendanceController::class, 'edit'])
        ->name('attendance.edit');

    // Update
    Route::middleware('permission:edit.attendance')
        ->put('/attendance/{attendance}', [AttendanceController::class, 'update'])
        ->name('attendance.update');

    // Delete
    Route::middleware('permission:delete.attendance')
        ->delete('/attendance/{attendance}', [AttendanceController::class, 'destroy'])
        ->name('attendance.destroy');

    // Export
    Route::middleware('permission:export.attendance')
        ->get('/attendance/export', [AttendanceController::class, 'export'])
        ->name('attendance.export');

    // Import (form + handle)
    Route::middleware('permission:import.attendance')
        ->get('/attendance/import', [AttendanceController::class, 'importForm'])
        ->name('attendance.import.form');

    Route::middleware('permission:import.attendance')
        ->post('/attendance/import', [AttendanceController::class, 'handleImport'])
        ->name('attendance.import.handle');

    Route::middleware('permission:view.users')
        ->get('/employees', [UserController::class, 'index'])
        ->name('employees');

    Route::middleware('permission:create.users')
        ->post('/employees', [UserController::class, 'store'])
        ->name('employees.store');

        // Create branch
        Route::middleware('permission:view.branches')
    ->get('/branches', [BranchController::class, 'index'])
    ->name('branches.index');

// Create
Route::middleware('permission:create.branches')
    ->get('/branches/create', [BranchController::class, 'create'])
    ->name('branches.create');

// Store
Route::middleware('permission:write.branches')
    ->post('/branches', [BranchController::class, 'store'])
    ->name('branches.store');

// Edit
Route::middleware('permission:edit.branches')
    ->get('/branches/{id}/edit', [BranchController::class, 'edit'])
    ->name('branches.edit');

// Update
Route::middleware('permission:edit.branches')
    ->put('/branches/{id}', [BranchController::class, 'update'])
    ->name('branches.update');

// Delete
Route::middleware('permission:delete.branches')
    ->delete('/branches/{id}', [BranchController::class, 'destroy'])
    ->name('branches.destroy');

// Export
Route::middleware('permission:export.branches')
    ->get('/branches/export', [BranchController::class, 'export'])
    ->name('branches.export');

// Import form
Route::middleware('permission:import.branches')
    ->get('/branches/import', [BranchController::class, 'importForm'])
    ->name('branches.import.form');

// Handle import
Route::middleware('permission:import.branches')
    ->post('/branches/import', [BranchController::class, 'handleImport'])
    ->name('branches.import.handle');

// now department routes

// List / Index
Route::middleware('permission:view.departments')
    ->get('/departments', [DepartmentController::class, 'index'])
    ->name('departments.index');

// Create
Route::middleware('permission:create.departments')
    ->get('/departments/create', [DepartmentController::class, 'create'])
    ->name('departments.create');

// Store
Route::middleware('permission:write.departments')
    ->post('/departments', [DepartmentController::class, 'store'])
    ->name('departments.store');

// Edit
Route::middleware('permission:edit.departments')
    ->get('/departments/{department}/edit', [DepartmentController::class, 'edit'])
    ->name('departments.edit');

// Update
Route::middleware('permission:edit.departments')
    ->put('/departments/{department}', [DepartmentController::class, 'update'])
    ->name('departments.update');

// Delete
Route::middleware('permission:delete.departments')
    ->delete('/departments/{department}', [DepartmentController::class, 'destroy'])
    ->name('departments.destroy');

// Export
Route::middleware('permission:export.departments')
    ->get('/departments/export', [DepartmentController::class, 'export'])
    ->name('departments.export');

// Import form
Route::middleware('permission:import.departments')
    ->get('/departments/import', [DepartmentController::class, 'importForm'])
    ->name('departments.import.form');

// Handle import
Route::middleware('permission:import.departments')
    ->post('/departments/import', [DepartmentController::class, 'handleImport'])
    ->name('departments.import.handle');

// payroll
// List / Index
Route::middleware('permission:view.payroll')
    ->get('/payroll', [PayrollController::class, 'index'])
    ->name('payroll.index');

// Create
Route::middleware('permission:create.payroll')
    ->get('/payroll/create', [PayrollController::class, 'create'])
    ->name('payroll.create');

// Store
Route::middleware('permission:write.payroll')
    ->post('/payroll', [PayrollController::class, 'store'])
    ->name('payroll.store');

// Edit
Route::middleware('permission:edit.payroll')
    ->get('/payroll/{payroll}/edit', [PayrollController::class, 'edit'])
    ->name('payroll.edit');

// Update
Route::middleware('permission:edit.payroll')
    ->put('/payroll/{payroll}', [PayrollController::class, 'update'])
    ->name('payroll.update');

// Delete
Route::middleware('permission:delete.payroll')
    ->delete('/payroll/{payroll}', [PayrollController::class, 'destroy'])
    ->name('payroll.destroy');

// Export
Route::middleware('permission:export.payroll')
    ->get('/payroll/export', [PayrollController::class, 'export'])
    ->name('payroll.export');

// Import form
Route::middleware('permission:import.payroll')
    ->get('/payroll/import', [PayrollController::class, 'importForm'])
    ->name('payroll.import.form');

// Handle import
Route::middleware('permission:import.payroll')
    ->post('/payroll/import', [PayrollController::class, 'handleImport'])
    ->name('payroll.import.handle');



    // annoucement routes
    Route::middleware('permission:view.announcements')
    ->get('/announcements', [AnnouncementController::class, 'index'])
    ->name('announcements.index');

// Create
Route::middleware('permission:create.announcements')
    ->get('/announcements/create', [AnnouncementController::class, 'create'])
    ->name('announcements.create');

// Store
Route::middleware('permission:write.announcements')
    ->post('/announcements', [AnnouncementController::class, 'store'])
    ->name('announcements.store');

// Edit
Route::middleware('permission:edit.announcements')
    ->get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])
    ->name('announcements.edit');

// Update
Route::middleware('permission:edit.announcements')
    ->put('/announcements/{announcement}', [AnnouncementController::class, 'update'])
    ->name('announcements.update');

// Delete
Route::middleware('permission:delete.announcements')
    ->delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])
    ->name('announcements.destroy');

// Export
Route::middleware('permission:export.announcements')
    ->get('/announcements/export', [AnnouncementController::class, 'export'])
    ->name('announcements.export');

// Import form
Route::middleware('permission:import.announcements')
    ->get('/announcements/import', [AnnouncementController::class, 'importForm'])
    ->name('announcements.import.form');

// Handle import
Route::middleware('permission:import.announcements')
    ->post('/announcements/import', [AnnouncementController::class, 'handleImport'])
    ->name('announcements.import.handle');

    //settings
    Route::middleware('permission:view.settings')
    ->get('/settings', [SettingController::class, 'index'])
    ->name('settings.index');

// Create
Route::middleware('permission:create.settings')
    ->get('/settings/create', [SettingController::class, 'create'])
    ->name('settings.create');

// Store
Route::middleware('permission:write.settings')
    ->post('/settings', [SettingController::class, 'store'])
    ->name('settings.store');

// Edit
Route::middleware('permission:edit.settings')
    ->get('/settings/{setting}/edit', [SettingController::class, 'edit'])
    ->name('settings.edit');

// Update
Route::middleware('permission:edit.settings')
    ->put('/settings/{setting}', [SettingController::class, 'update'])
    ->name('settings.update');

// Delete
Route::middleware('permission:delete.settings')
    ->delete('/settings/{setting}', [SettingController::class, 'destroy'])
    ->name('settings.destroy');

// Export
Route::middleware('permission:export.settings')
    ->get('/settings/export', [SettingController::class, 'export'])
    ->name('settings.export');

// Import form
Route::middleware('permission:import.settings')
    ->get('/settings/import', [SettingController::class, 'importForm'])
    ->name('settings.import.form');

// Handle import
Route::middleware('permission:import.settings')
    ->post('/settings/import', [SettingController::class, 'handleImport'])
    ->name('settings.import.handle');
});



Route::get('/new-test', [AttendanceController::class, 'test'])->name('attendance.test');




// Manager Routes
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [DashboardController::class, 'managerDashboard'])->name('manager.dashboard');
});

// Employee Routes
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [DashboardController::class, 'employeeDashboard'])->name('employee.dashboard');

    
});


Route::get('/test', [UserController::class, 'test'])->name('user.register.form');
