<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectDashboard() {
        return view('admin.project.dashboard');
    }
}
