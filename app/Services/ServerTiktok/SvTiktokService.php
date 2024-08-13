<?php

namespace App\Services\ServerTiktok;

use App\Models\SvTiktok;
use Illuminate\Support\Facades\Auth;

class SvTiktokService
{
    public function getALlSvTiktoks($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($user->hasRole('admin')) {
            $svTiktok = SvTiktok::query()->orderBy($column1, $direction)->paginate($limit);
        }
        return $svTiktok;
    }

}
