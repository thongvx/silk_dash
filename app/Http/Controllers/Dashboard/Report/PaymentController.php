<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Repositories\ReportRepo;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PaymentController extends Controller
{
    protected $reportRepo;

    public function __construct(ReportRepo $reportRepo)
    {
        $this->reportRepo = $reportRepo;
    }
    public function store(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:20|max:2000',
        ]);
        $user = auth()->user();
        $totalProfitkey = "user:{$user->id}:total_profit";
        $totalProfit = Redis::get($totalProfitkey);
        if(empty($totalProfit)){
            $totalProfit = $this->reportRepo->where('user_id', $user->id)->sum('revenue');
            Redis::setex($totalProfitkey, 86400, $totalProfit);
        }
        $totalWithdrawalskey = "user:{$user->id}:total_withdrawal";
        $totalWithdrawals = Redis::get($totalWithdrawalskey);
        if(empty($totalWithdrawals)){
            $totalWithdrawals = $this->reportRepo->getPayment($user->id)->sum('amount');
            Redis::setex($totalWithdrawalskey, 86400, $totalWithdrawals);
        }
        $totalbelance = $totalProfit - $totalWithdrawals;
        if($request->amount > $totalbelance || $request->amount > 2000){
            return back()->with('error', 'The amount you entered is greater than your balance.');
        }
        $amount = $request->amount;
        $gift = 0;
        if($request->gift == 1){
            if ($amount <= 100) {
                $gift = $amount * 0.1;
            } else if ($amount > 100 && $amount <= 300) {
                $gift = $amount * 0.15;
            } else if ($amount > 300 && $amount <= 600) {
                $gift = $amount * 0.2;
            } else if ($amount > 600 && $amount <= 1200) {
                $gift = $amount * 0.25;
            } else {
                $gift = $amount * 0.3;
            }
        }
        $payment = new Payment;
        $payment->amount = $request->amount;
        $payment->gift = $gift;
        $payment->transaction_ID = $user->usdt_address ?? '';
        $payment->network = $user->network ?? '';
        $payment->user_id = $user->id;
        $payment->status = 0;
        $payment->user_name = $user->name;
        $payment->comment = '';
        $payment->save();

        return back()->with('success', 'Payment request submitted successfully.');
    }
}
