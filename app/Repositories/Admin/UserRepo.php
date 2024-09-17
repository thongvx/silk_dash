<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\File;
use Illuminate\Support\Facades\Redis;


class UserRepo
{
    public function model()
    {
        return User::class;
    }

    public function getAllUsers($tab, $column , $direction, $limit, $columns)
    {
        $query = User::query()
                ->whereDoesntHave('roles', function ($query) {
                        $query->where('name', 'admin');
                    });

        $column1 = $column == 'created_at' ? 'id' : $column;

        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        switch ($tab){
            case 'unverified':
                $query->whereIn('active', [0, null]);
                break;
            case 'delete':
                $query->where('active', 19);
                break;
            case 'premium':
                $query->where('encoder_priority', '>=', 5);
                break;
            case 'free':
                $query->where('active', [1,2])
                        ->where('premium', 0);
                break;
            default:
                break;
        }

        $users = $query->orderBy($column1, $direction)
                        ->paginate($limit);
        return $users;
    }

    public function getUserById($id)
    {
        $keys = 'user:'.$id;
        $user = Redis::get($keys);
        if (isset($user)) {
            return unserialize($user);
        }
        $user = User::query()->where('id', $id)->first();
        Redis::setex($keys, 259200, serialize($user));
        return $user;
    }

    //search user
    public function searchUser($search, $column, $direction, $limit, $columns)
    {
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $query = User::query()
                ->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('id', 'like', '%' . $search . '%');
                });
        $users = $query->orderBy($column1, $direction)
                        ->paginate($limit);
        return $users;
    }

    // Add more methods as needed
}
