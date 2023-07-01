<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LogController extends Controller
{
    public function index() {
        return view('dashboard.log.index', [
            'title' => "Log",
            'active' => 'log',
        ]);
    }
}
