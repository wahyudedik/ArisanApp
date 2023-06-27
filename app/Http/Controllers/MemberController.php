<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('member.dashboard', compact('groups'));
    }

}
