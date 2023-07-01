<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

    public function role()
    {
        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.dashboard');
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'member') {
            return redirect()->route('member.index');
        }
    }
}
