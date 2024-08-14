<?php

namespace App\Http\Controllers\admin;

use App\Models\Payment;
use App\Repositories\Admin\PaymentRepo;
use Illuminate\Http\Request;

class PaymentController
{
    protected $paymentRepo;

    public function __construct(PaymentRepo $paymentRepo)
    {
        $this->paymentRepo = $paymentRepo;
    }

    public function index()
    {
        $payments = $this->paymentRepo->getAllPayment();
        $data =[
            'title' => 'Payment',
            'payments' => $payments,
        ];
        return view('admin.payment.payment', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $payment = Payment::find($id);
        $payment->update($data);
        return response()->json($payment);
    }

}
