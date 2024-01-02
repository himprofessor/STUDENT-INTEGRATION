<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public static function showLoginForm()
    {
        return view('content.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        // $remember = $request->has('remember');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
    
        return back()->withErrors(['password' => 'Invalid credentials']);
    }

    public function logout()
    {
        // dd(1);
        Auth::logout();

        return redirect('/login');
    }
}
