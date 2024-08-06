<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use App\Models\TerminalPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TerminalPermisController extends Controller
{
    public function index()
    {
        return view('dashboard.terminal-permis.index', [
            'title' => 'Terminal Permission',
            'active' => 'terminal-permission',
            'hooks' => Hook::all(),
            'users' => User::all(),
            'terminalpermiss' => TerminalPermission::where('status', 1)->latest()->get()
        ])->with('i');
    }

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'hook_id' => 'required',
            'user_id' => 'required'
        ]);

        $validatedData['id_terminal_permission'] = Str::uuid()->toString();
        TerminalPermission::create($validatedData);
        return back()->with('successPost', 'Terminal Permission has been created!!');
    }

    public function delete(TerminalPermission $terminalpermission)
    {
        $terminalpermission->update(['status' => 0]);
        return back()->with('successDelete', 'Terminal Permission has been deleted!!');
    }
}
