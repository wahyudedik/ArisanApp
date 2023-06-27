<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? redirect()->back()->with('status', __($status))
            : redirect()->back()->withErrors(['email' => __($status)]);
    }

    public function showLinkRequestForm()
    {
        return view('email');
    }
}
