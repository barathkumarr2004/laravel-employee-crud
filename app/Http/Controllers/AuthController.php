<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register Page
    public function register()
    {
        return view('register');
    }

public function saveRegister(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => 'User',
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Registration Successful');
}

    // Login Page
    public function login()
    {
        return view('login');
    }

    // Login Check
    public function loginCheck(Request $request)
    {
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]))
        {
            return redirect('/');
        }

        return back()->with('error','Invalid Email or Password');
    }

    // Logout
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}