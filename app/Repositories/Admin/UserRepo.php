<?php

namespace App\Repositories\Admin;

use App\Models\User;
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
        $cache_keys = 'all_users' . $tab . $column . $direction . $limit;
        $user = Redis::get($cache_keys);
        if(isset($user)){
            return unserialize($user);
        }
        $query = User::query()
                ->whereDoesntHave('roles', function ($query) {
                        $query->where('name', 'admin');
                    });
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        switch ($tab){
            case 'unverified':
                $query->whereIn('active', [0, null]);
                break;
            case 'delete':
                $query->where('active', 19);
                break;
            case 'premium':
                $query->whereIn('premium', [1,2,3]);
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
        Redis::setex($cache_keys, 259200, serialize($users));
        return $users;
    }

    public function getUserById($id)
    {
        $users = $this->getAllUsers('all', 'created_at', 'desc', 100, ['*']);
        return $users->find($id);
    }

    //search user
    public function searchUser($search, $column, $direction, $limit, $columns)
    {
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $users = User::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orderBy($column1, $direction)
            ->paginate($limit);
        return $users;
    }

    // Add more methods as needed
}
