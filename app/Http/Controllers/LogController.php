<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class LogController extends Controller
{
    public function index() {
        return view('dashboard.log.index', [
            'title' => "Log",
            'active' => 'log',
            // 'logs' => DB::table('logs')->paginate(10)
            'logs' => Log::all()
        ])->with('i');
    }
}
