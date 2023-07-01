<?php

namespace App\Http\Controllers;

use App\Models\Group; 
use App\Models\Member;
use App\Models\MemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $groups = Group::all();
        return view('admin.dashboard', compact('groups', 'member'));
    }

    public function profile()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $memberRequest = MemberRequest::where('user_id', $user->id)->first();

        // Mengambil nama dan email dari tabel users
        $nama = $user->name;
        $email = $user->email;

        return view('admin.profile', compact('member', 'nama', 'email', 'memberRequest'));
    }
}
