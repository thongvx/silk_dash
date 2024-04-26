<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiniMenuController extends Controller
{
    public function update(Request $request)
    {
        // Cập nhật giá trị của session
        session(['minimenu' => $request->input('minimenu')]);

        // Gửi lại phản hồi
        return response()->json(['status' => session('minimenu')]);
    }
}
