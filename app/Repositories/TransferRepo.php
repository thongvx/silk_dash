<?php

namespace App\Repositories;

use App\Models\Transfer;
use Prettus\Repository\Eloquent\BaseRepository;


class TransferRepo extends BaseRepository
{
    public function model()
    {
        return Transfer::class;
    }

    public function getAllUserTransfer($userId, $limit, $columns = ['*'])
    {
        $transfers = $this->query()
            ->where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->paginate($limit);
        return $transfers;
    }
    public function getTransferById($slug)
    {
        $transfer = $this->query()
            ->where('user_id', auth()->id())
            ->where('slug', $slug)
            ->first();
        return $transfer;
    }
}
