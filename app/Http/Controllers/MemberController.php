<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'max:50',
            'email' => 'email|max:50',
            'alamat' => 'max:255',
            'no_hp' => 'max:12',
            'no_rekening' => 'max:16',
        ]);

        $member = Member::findOrFail($id);

        // Update data pada tabel members
        $member->alamat = $request->alamat;
        $member->no_hp = $request->no_hp;
        $member->no_rekening = $request->no_rekening;
        $member->save();

        // Update data pada tabel users
        $user = User::findOrFail($member->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('member.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image
        ]);

        $member = Member::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images'), $gambarName);

            // Update the profile image
            $member->gambar = $gambarName;
            $member->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function profile()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();

        // Mengambil nama dan email dari tabel users
        $nama = $user->name;
        $email = $user->email;

        return view('member.profile', compact('member', 'nama', 'email'));
    }
}
