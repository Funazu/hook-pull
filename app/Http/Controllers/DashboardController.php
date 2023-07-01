<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function profile()
    {
        return view('dashboard.profile', [
            'title' => "Profile",
            'active' => "profile"
        ]);
    }

    public function changePassword(Request $request, User $user) {
        $validatedData = $request->validate([
            'password' => 'required'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user->update($validatedData);
        Auth::logout();
        // return back()->with('successPost', "Successfully Updated");
        return redirect()->route('login');
    }
}
