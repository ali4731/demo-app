<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    
    public function userlogin()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/job');
    }









    public function logout()
    {
        Auth::logout();
    
        session()->invalidate();
        session()->regenerateToken();
    
        return redirect('/login');
    }
}
