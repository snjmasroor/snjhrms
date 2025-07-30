<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

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
