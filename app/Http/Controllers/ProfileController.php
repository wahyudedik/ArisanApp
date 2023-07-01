<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profileUpdate(Request $request, string $id)
    {
        $request->validate([
            'name' => 'max:50',
            'email' => 'email|max:50',
            'alamat' => 'max:255',
            'no_hp' => 'max:12',
            'no_rekening' => 'max:16',
        ]);

        $member = Member::findOrFail($id);

        // Memeriksa apakah Member terkait dengan User yang terotentikasi
        if ($member->user_id !== Auth::user()->id) {
            abort(403); // Memberikan respons Forbidden jika tidak terkait
        }

        // Update data pada tabel members
        $member->update($request->only(['alamat', 'no_hp', 'no_rekening']));

        // Update data pada tabel users
        $user = User::findOrFail($member->user_id);
        $user->update($request->only(['name', 'email']));

        return redirect()->back()->with('success', 'Data Profile berhasil diperbarui');
    }

    public function profilePhotoUpdate(Request $request, $id)
    {
        // Validasi input file gambar
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Dapatkan data member berdasarkan ID
        $member = Member::find($id);

        // Pastikan member ditemukan
        if (!$member) {
            return redirect()->back()->with('error', 'Member tidak ditemukan.');
        }

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            // Generate nama unik untuk file gambar
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Simpan gambar ke folder public/images
            $file->storeAs('images', $filename, 'public');

            // Perbarui kolom gambar dalam tabel members dengan nama file gambar baru
            $member->gambar = $filename;

            // Simpan perubahan
            $member->save();

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui foto profil.');
    }
}
