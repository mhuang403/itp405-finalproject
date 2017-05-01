<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use DB;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function signup()
    {
        $email = request('email');
        $password = request('password');
        $passwordConfirm = request('password_confirmation');


        $userList = DB::table('users')
            ->where('email', '=', $email)
            ->get();

        if (count($userList) == 0) {
            if ($password != $passwordConfirm) {
                return redirect('/signup')->with('error', 'Password confirmation does not match. Please try again.');
            }
                $user = new User();
                $user->email = request('email');
                $user->password = Hash::make(request('password'));
                $user->save();
                return redirect('/');
            }
        else{
                return redirect('/signup')->with('error', 'Email already exists! Try a different one.');
            }
        }

}
