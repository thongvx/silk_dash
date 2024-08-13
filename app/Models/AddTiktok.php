<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTiktok extends Model
{
    use HasFactory;

    protected $table = 'add_tiktok';

    protected $fillable = [
        'status',
        'slug',
        'quality',
        'path',
        'sv',
    ];
}
