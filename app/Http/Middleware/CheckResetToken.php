<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckResetToken
{
    public function handle($request, Closure $next)
    {
        $plainTextToken = $request->route('token');

        $tokenRecords = DB::table('password_reset_tokens')->get();
        $matchingRecord = null;

        foreach ($tokenRecords as $record) {
            if (Hash::check($plainTextToken, $record->token)) {
                $matchingRecord = $record;
                break;
            }
        }
        if (!$matchingRecord || $this->tokenExpired($matchingRecord->created_at)) {
            return redirect(route('password.request'));
        }

        return $next($request);
    }

    protected function tokenExpired($createdAt)
    {
        $expires = config('auth.passwords.users.expire');
        return now()->diffInMinutes($createdAt) > $expires;
    }

}
