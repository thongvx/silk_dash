<?php

namespace App\Models;

use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'telegram',
        'skype',
        'website',
        'video',
        'storage',
        'last_upload',
        'max_transfer',
        'max_torrent',
        'encoder_priority',
        'transfer_priority',
        'download_priority',
        'torrent_priority',
        "stream_priority",
        'usdt_address',
        'network',
        'token',
        'key_api',
        'updated_at',
        'created_at',
        'active',
        'ftp_user',
        'ftp_password',
        'ftp_link',
        'uploaded',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    // In the `AppServiceProvider` or a dedicated service provider


    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Redis::del('all_users');
        });
        static::saved(function ($model) {
            Redis::del('user:' . $model->id);
        });
        static::updated(function ($model) {
            Redis::del('all_users');
            Redis::del('user:' . $model->id);
        });

        static::deleted(function ($model) {
            Redis::del('all_users');
            Redis::del('user:' . $model->id);
        });
    }
}
