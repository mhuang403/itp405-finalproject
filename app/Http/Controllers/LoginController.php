<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $loginWasSuccessful = Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($loginWasSuccessful) {
            return redirect('/winelist');
        } else {
            return redirect('/signup');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
