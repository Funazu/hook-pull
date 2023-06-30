<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => "Dashboard",
            'active' => "dashboard",
            'hook' => Hook::all(),
            'success' => Log::where('status', 'success')->get(),
            'error' => Log::where('status', 'error')->get()
        ]);
    }
}
