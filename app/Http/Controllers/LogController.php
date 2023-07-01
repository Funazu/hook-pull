<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class LogController extends Controller
{
    public function index(Request $request) {
        // $logs = Log::with('hook')->latest();
        $logs = Log::query()->latest();
        if(!empty($request->webhook)) {
            $logs = $logs->where('hook_id', $request->webhook ?? '');
        }
        
        return view('dashboard.log.index', [
            'title' => "Log",
            'active' => 'log',
            // 'logs' => DB::table('logs')->with('hook')->paginate(10)
            'logs' => $logs->paginate(10)->withQueryString(),
            'webhooks' => Hook::all() 
            // 'logs' => Log::all()
        ])->with('i');
    }
}
