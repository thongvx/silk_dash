<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\File;


class UserRepo
{
    public function model()
    {
        return User::class;
    }

    public function getAllUsers($tab, $column , $direction, $columns, $limit)
    {
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
        return $users;
    }

    public function getUserById($id)
    {
        $user = User::query()->where('id', $id)->first();
        return $user;
    }

    // Add more methods as needed
}
