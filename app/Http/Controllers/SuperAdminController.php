<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.dashboard', compact('users', 'active'));
    }

    public function listAdmin()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.list-admin', compact('users', 'active'));
    }

    public function listMember()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.list-member', compact('users', 'active'));
    }

    public function historyGroupChat()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.history-groupchat', compact('users', 'active'));
    }

    public function historyPembayaran()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.history-pembayaran', compact('users', 'active'));
    }

    public function historyPengiriman()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.history-pengiriman', compact('users', 'active'));
    }

    public function historyPemenang()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        $active = true;
        return view('superadmin.history-pemenang', compact('users', 'active'));
    }
}
