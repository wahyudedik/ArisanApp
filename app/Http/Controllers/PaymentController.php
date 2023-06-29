<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'user_id' => 'required',
            'payment_method' => 'required',
            'jumlah' => 'required|numeric',
            'gambar' => 'required|image',
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar')->store('images', 'public');
        $status = false;

        Payment::create([
            'group_id' => $request->group_id,
            'user_id' => $request->user_id,
            'payment_method' => $request->payment_method,
            'jumlah' => $request->jumlah,
            'gambar' => $gambarPath,
            'status' => $status,
        ]);

        return redirect()->route('member.groups.payment', $request->group_id)
            ->with('success', 'Payment added successfully.');
    }
}
