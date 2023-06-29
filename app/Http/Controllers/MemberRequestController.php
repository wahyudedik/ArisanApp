<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberRequest;
use Illuminate\Support\Facades\Auth;

class MemberRequestController extends Controller
{
    public function activate(Request $request)
    {
        $user_id = $request->input('user_id');
        $member_id = $request->input('member_id');
        $status = $request->input('status');

        // Buat instance Model MemberRequest
        $memberRequest = new MemberRequest();
        $memberRequest->user_id = $user_id;
        $memberRequest->member_id = $member_id;
        $memberRequest->status = $status;

        // Simpan data member request ke database
        $memberRequest->save();

        // Lakukan tindakan lain sesuai kebutuhan Anda

        return redirect()->back()->with('success', 'Member request berhasil diaktifkan.');
    }

    public function processActivation($id)
    {
        // Proses aktivasi member request
    }
}
