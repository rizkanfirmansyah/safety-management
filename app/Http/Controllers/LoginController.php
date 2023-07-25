<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login')->with('error', 'Error!, Username or Password Wrong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
