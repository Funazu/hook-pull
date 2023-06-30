<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {
        return view('dashboard.log.index', [
            'title' => "Log",
            'active' => 'log',
        ]);
    }
}
