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
        return view('superadmin.dashboard', compact('users'));
    }

}
