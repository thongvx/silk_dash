<?php

namespace App\Repositories\Admin;

use App\Models\Payment;

class PaymentRepo
{
    public function model()
    {
        return Payment::class;
    }

    public function getAllPayment($direction, $column, $limit, $columns){
        $query = Payment::query();
        $payments = $query->orderBy($column, $direction)
            ->paginate($limit);
        return $payments;
    }

    // Add other methods as needed...
}
