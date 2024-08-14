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
        $cache_keys = 'all_users';
        $all_users = Redis::get($cache_keys);
        if(isset($all_users)){
            $all_users = unserialize($all_users);
        }else{
            $all_users = User::all()->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            });
            Redis::setex($cache_keys, 259200, serialize($all_users));
        }

        $column1 = $column == 'created_at' ? 'id' : $column;

        switch ($tab) {
            case 'unverified':
                $all_users = $all_users->whereIn('active', [0, null]);
                break;
            case 'delete':
                $all_users = $all_users->where('active', 19);
                break;
            case 'premium':
                $all_users = $all_users->whereIn('premium', [1, 2, 3]);
                break;
            case 'free':
                $all_users = $all_users->whereIn('active', [1, 2])
                    ->where('premium', 0);
                break;
            default:
                break;
        }

        $sortedData = $all_users->sortBy($column1, SORT_REGULAR, $direction === 'desc');
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $sortedData->slice(($currentPage - 1) * $limit, $limit)->values();
        $users = new LengthAwarePaginator($currentPageItems, $sortedData->count(), $limit, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        return $users;
    }

    public function getUserById($id)
    {
        $cache_keys = 'all_users';
        $all_users = Redis::get($cache_keys);
        if(isset($all_users)){
            $all_users = unserialize($all_users);
        }else{
            $all_users = User::all()->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            });
            Redis::setex($cache_keys, 259200, serialize($all_users));
        }
        $user = $all_users->where('id', $id)->first();
        return $user;
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
