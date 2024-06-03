<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Transfer extends Model
{


    protected $table = 'transfer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'priority',
        'url',
        'status',
        'sv_transfer',
        'folder_id',
        'progress',
        'size_download',
        'size',
    ];
    protected static function boot(){
        parent::boot();
        static::created(function(){

        });
    }
}
