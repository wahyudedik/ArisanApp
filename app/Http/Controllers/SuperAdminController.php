<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $groups = Group::all();
        return view('superadmin.dashboard', compact('groups', 'member'));
    }
}
