<?php

namespace App\Repositories\Admin;

use App\Models\SvEncoder;
use App\Models\SvStorage;
use App\Models\SvStream;
use Illuminate\Support\Facades\Auth;

class ComputeRepo
{

    public function getAllSvEncoders($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($user->hasRole('admin')) {
            $svEncoder = SvEncoder::query()->orderBy($column1, $direction)->paginate($limit);
        }

        return $svEncoder;
    }

    public function getAllSvStreams($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($user->hasRole('admin')) {
            $svStreams = SvStream::query()->orderBy($column1, $direction)->paginate($limit);
        }

        return $svStreams;
    }

    public function getALlSvStorages($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($user->hasRole('admin')) {
            $svStorage = SvStorage::query()->orderBy($column1, $direction)->paginate($limit);
        }
        return $svStorage;
    }


}
