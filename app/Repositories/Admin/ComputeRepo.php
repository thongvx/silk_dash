<?php

namespace App\Repositories;

use App\Models\Svencoder;
use App\Models\Svstream;
use App\Models\Svsto;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Contracts\Auth\Guard;

class ComputerRepo
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        parent::__construct(app());
        $this->auth = $auth;
    }


    public function getAllEncoders()
    {
        $user = Auth::user();
        if ($this->auth->user()->hasRole('admin')) {
            $encoder = SvEncoder::query()->get();
        }else{
            $encoder = SvEncoder::query()->where('user_id', $user->id)->get();
        }

        return $encoder;
    }

    public function getAllStreams()
    {
        if ($this->auth->user()->hasRole('admin')) {
            return Svstream::query()->get();
        }

        return null;
    }

    public function getAllStis()
    {
        if ($this->auth->user()->hasRole('admin')) {
            return Svsti::query()->get();
        }

        return null;
    }
}
