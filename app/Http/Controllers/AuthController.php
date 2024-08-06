<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login', [
            'title' => "Login"
        ]);
    }

    public function loginPost(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $checkUser = User::where('username', $request->username)->first();
            $request->session()->regenerate();
            if($checkUser->is_admin === 1) {
                return redirect()->intended('/dashboard');
            }
            return redirect()->route('terminal');
        }

        return back()->with('loginError', 'Gagal Login!!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
