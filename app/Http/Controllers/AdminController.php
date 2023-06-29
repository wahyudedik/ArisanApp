<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $groups = Group::all();
        return view('admin.dashboard', compact('groups', 'member'));
    }
}
