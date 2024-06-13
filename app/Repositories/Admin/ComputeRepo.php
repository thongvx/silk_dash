<?php

namespace App\Repositories\Admin;

use App\Models\Svencoder;
use App\Models\SvStorage;
use App\Models\Svstream;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Contracts\Auth\Guard;

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
