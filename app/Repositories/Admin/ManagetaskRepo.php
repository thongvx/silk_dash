<?php

namespace App\Repositories\Admin;

use App\Models\EncoderTask;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;


class ManagetaskRepo
{
    public function getAllEncoders($tab, $column, $direction, $limit, $status)
    {
        $query = EncoderTask::query();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        switch ($status) {
            case 'pending':
                $query->where('status', 0);
                break;
            case 'encoding':
                $query->where('status', 1);
                break;
            case 'completed':
                $query->whereIn('status', [5,6, 2]);
                break;
            case 'failed':
                $query->where('status', 19);
                break;
            default:
                $query->whereIn('status', [0, 1, 2, 5, 6, 19]);
                break;
        }
        if (Auth::user()->hasRole('admin')) {

            $encoder = $query->orderBy($column1, $direction)->paginate($limit);
        } else {
            $encoder = $query->where('user_id', Auth::user()->id)->orderBy($column1, $direction)->paginate($limit);
        }

        return $encoder;
    }

    public function getAllTransfer($tab, $column, $direction, $limit)
    {
        $query = Transfer::query();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $query->where('status', 3);
        if (Auth::user()->hasRole('admin')) {
            $transfer = $query->orderBy($column1, $direction)->paginate($limit);
        } else {
            $transfer = $query->where('user_id', Auth::user()->id)->orderBy($column1, $direction)->paginate($limit);
        }

        return $transfer;
    }


    public function getAllStis()
    {
        if ($this->auth->user()->hasRole('admin')) {
            return Svsti::query()->get();
        }

        return null;
    }
}
