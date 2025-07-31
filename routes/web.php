<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BranchController;

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    elseif (auth()->check() && auth()->user()->role === 'hr') {
        return redirect()->route('hr.dashboard');
    }
    elseif (auth()->check() && auth()->user()->role === 'manager') {
        return redirect()->route('manager.dashboard');
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
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendence');
    
    //Employees
    Route::get('/employees', [UserController::class, 'index'])->name('employees');
    Route::post('/employees', [UserController::class, 'store'])->name('employees.store');


    // Department
    Route::get('/departments', [DepartmentController::class, 'index'])->name('department');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    // Update a department
    Route::post('/departments/{id}/update', [DepartmentController::class, 'update'])->name('departments.update');
    // Delete a department
    Route::delete('/departments/{id}/delete', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    

    // Branch
    Route::get('/branch', [BranchController::class, 'index'])->name('branch');
    Route::post('/branch', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/branch/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    // Update branch
    Route::post('/branch/update/{id}', [BranchController::class, 'update'])->name('branch.update');
    // Delete branch
    Route::delete('/branches/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');

});
    Route::post('/new-test', [AttendanceController::class, 'test'])->name('excel.process-read');



// HR Routes
Route::middleware(['auth', 'role:hr'])->group(function () {
    Route::get('/hr/dashboard', [DashboardController::class, 'hrDashboard'])->name('hr.dashboard');
});

// Manager Routes
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [DashboardController::class, 'managerDashboard'])->name('manager.dashboard');
});

// Employee Routes
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [DashboardController::class, 'employeeDashboard'])->name('employee.dashboard');
});


Route::get('/test', [UserController::class, 'test'])->name('user.register.form');
