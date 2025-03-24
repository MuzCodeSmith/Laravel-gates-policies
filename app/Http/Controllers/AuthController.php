<?php

namespace App\Http\Controllers;

// models 
use App\Models\User\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public  function registerPage(){
        return view('Auth.register-page');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);

        $createdUser =  User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
        ]);

        return redirect()->route('auth.login-page')->with('success', 'Registration successful. Please login.');
    }

    public function loginPage(){
        return view('Auth.login-page');
    }
    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
      
    }

    public function logoutUser(){
        Auth::logout();
        Session::flush();
        return redirect()->route('auth.login-page')->with('success', 'Logged out successfully');
    }
}
