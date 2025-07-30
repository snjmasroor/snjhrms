<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard() {
        return view('admin.dashboard');
    }
    public function hrDashboard() {
        return view('hr.dashboard');
    }
    public function managerDashboard() {
        return view('manager.dashboard');
    }
    public function employeeDashboard() {
        return view('employee.dashboard');
    }
}
