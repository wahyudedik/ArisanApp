<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $groups = Group::all();
        return view('member.dashboard', compact('groups', 'member'));
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

    public function groupsDetails($id)
    {
        $groups = Group::findOrFail($id);
        $users = Auth::user();
        return view('member.chatbox', compact('groups', 'users'));
    }
}
