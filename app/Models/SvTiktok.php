<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvTiktok extends Model
{
    use HasFactory;

    protected $table = 'sv_tiktok';

    protected $fillable = [
        'name',
        'key_api',
        'active',
    ];
}
