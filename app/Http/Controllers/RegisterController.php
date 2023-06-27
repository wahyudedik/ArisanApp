<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
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
}
