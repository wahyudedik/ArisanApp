<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class SessionController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function role()
    {
        if (Auth::user()->role == 'superadmin') {
            return view('superadmin/dashboard');
        } elseif (Auth::user()->role == 'admin') {
            return view('admin/dashboard');
        } elseif (Auth::user()->role == 'member') {
            return view('member/dashboard');
        }
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
            return redirect('/');
        } else {
            return redirect('')->withErrors('Email Atau Password Salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Setelah pendaftaran, cek apakah data member sudah ada berdasarkan user_id
        $member = Member::where('user_id', $user->id)->first();

        if (!$member) {
            // Jika data member belum ada, tambahkan data member baru
            $member = new Member();
            $member->user_id = $user->id;
            $member->save();
            // Jika data member belum ada, tampilkan tampilan "Tolong lengkapi data profile dulu"
            return redirect('/')->with('success', 'Registration successful. Please login.');
        }
    }

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

    public function showResetForm($token)
    {
        return view('reset')->with(['token' => $token, 'email' => request()->query('email')]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : redirect()->back()->withErrors(['email' => __($status)]);
    }
}
