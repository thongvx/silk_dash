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
        $data = $this->encoderTask
            ->join('videos', 'encoder_task.slug', '=', 'videos.slug')
            ->where('encoder_task.slug', $slug)
            ->selectRaw('encoder_task.slug as slug,
                        encoder_task.size as size,
                        encoder_task.user_id as user_id,
                        videos.title as title,
                        GROUP_CONCAT(encoder_task.quality) as qualities,
                        GROUP_CONCAT(encoder_task.status) as status,
                        count(*) as total,
                        MAX(encoder_task.created_at) as created_at,
                        MAX(encoder_task.updated_at) as updated_at'
            )
            ->groupBy('encoder_task.slug', 'encoder_task.size', 'encoder_task.user_id', 'videos.title')
            ->first();
        return $data;
    }
    public function deleteEncoder($slug)
    {
        $this->encoderTask->where('slug', $slug)->delete();
    }
    //search encoder
    public function searchEncoder($search, $column, $direction, $limit,$status, $columns)
    {
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $query = $this->encoderTask->query();
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
        $data = $query->where('slug', 'like', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->orWhere('sv_encoder', 'like', '%' . $search . '%')
            ->orderBy($column1, $direction)
            ->paginate($limit);
        return $data;
    }
}
