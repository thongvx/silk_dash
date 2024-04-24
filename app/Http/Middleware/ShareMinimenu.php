<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShareMinimenu
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('minimenu')) {
            session(['minimenu' => 'false']);
        }

        view()->share('minimenu', session('minimenu'));

        return $next($request);
    }
}
