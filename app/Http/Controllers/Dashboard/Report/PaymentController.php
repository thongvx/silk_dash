<?php

namespace App\Http\Controllers\Dashboard\Report;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:100|max:10000',
        ]);

        $payment = new Payment;
        $payment->amount = $request->amount;
        $payment->transaction_ID = auth()->user()->usdt_address ?? '';
        $payment->network = auth()->user()->network ?? '';
        $payment->user_id = auth()->user()->id;
        $payment->status = 0;
        $payment->user_name = auth()->user()->name;
        $payment->comment = '';
        $payment->save();

        return back()->with('success', 'Payment request submitted successfully.');
    }
}
