<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Wajib Diisi',
                'password.required' => 'Password Wajib Diisi'
            ],

        );

        $infologin = [ 
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = $request->has('remember'); //Check if "Remember Me" checkbox is checked

        if (Auth::attempt($infologin, $remember)) {
            return redirect()->route('role.index');
        } else {
            return redirect('/login')->withErrors('Email Atau Password Salah')->withInput();
        }
    }
}
