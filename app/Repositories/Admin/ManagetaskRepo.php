<?php

namespace App\Repositories\Admin;

use App\Models\EncoderTask;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;


class ManagetaskRepo
{
    protected $encoderTask;
    protected $transfer;

    public function __construct(EncoderTask $encoderTask, Transfer $transfer)
    {
        $this->encoderTask = $encoderTask;
        $this->transfer = $transfer;
    }
    public function getAllEncoders($tab, $column, $direction, $limit, $status)
    {
        $query = $this->encoderTask->query();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        switch ($status) {
            case 'pending':
                $query->where('status', 0);
                break;
            case 'encoding':
                $query->whereIn('status', [1,3,2]);
                break;
            case 'completed':
                $query->whereIn('status', [4,5,6]);
                break;
            case 'failed':
                $query->whereIn('status', [19,11]);
                break;
            default:
                break;
        }
        $encoder = $query->orderBy($column1, $direction)->paginate($limit);

        return $encoder;
    }

    public function getAllTransfer($tab, $column, $direction, $limit)
    {
        $query = Transfer::query()
                ->join('folders', 'transfer.folder_id', '=', 'folders.id')
                ->select('transfer.*', 'folders.name_folder as folder_name');
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if (Auth::user()->hasRole('admin')) {
            $transfer = $query->orderBy($column1, $direction)->paginate($limit);
        } else {
            $transfer = $query->where('user_id', Auth::user()->id)->orderBy($column1, $direction)->paginate($limit);
        }

        return $transfer;
    }

    public function getEncoderBySlug($slug)
    {
        $data = $this->encoderTask->where('slug', $slug);
        return $data;
    }
}
