<?php

namespace App\Repositories\Admin;

use App\Models\Payment;

class PaymentRepo
{
    public function model()
    {
        return Payment::class;
    }

    public function getAllPayment(){
        $payment = Payment::query()->get();
        return $payment;
    }

    // Add other methods as needed...
}
