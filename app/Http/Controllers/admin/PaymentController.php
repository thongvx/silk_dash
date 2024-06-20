<?php

namespace App\Http\Controllers\admin;

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

}
