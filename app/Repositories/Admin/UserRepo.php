<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;


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
                $query->where('active', null);
                break;
            case 'delete':
                $query->where('active', 19);
                break;
            default:
                $query->whereIn('active', [1, 19]);
                break;
        }
        switch ($tab) {
            case 'premium':
                $query->whereIn('premium', [1,2,3])->where('active','!=', 19);
                break;
            case 'free':
                $query->where('premium', null)->where('active','!=', 19);
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
        return User::find($id);
    }

    // Add more methods as needed
}
