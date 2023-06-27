<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create()
    {
        // Mengambil data user untuk ditampilkan pada form
        $users = User::all();

        return view('admin.groupAdd', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Membuat grup baru
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->admin_id = auth()->user()->id; // Menggunakan ID pengguna yang sedang login
        $group->save();

        return redirect()->route('index')->with('success', 'Grup berhasil ditambahkan.');
    }


}
