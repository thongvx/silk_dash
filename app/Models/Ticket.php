<?php

namespace App\Models;

use App\Enums\TicketCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';

    protected $fillable = [
        'user_id',
        'subject',
        'topic',
        'status',
        'message',
        'url_file',
    ];
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->deleteCacheTicket();
        });
        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            if ($model->wasChanged('message')) {
                $model->deleteCacheTicketById();
            }
            $model->deleteCacheTicket();
        });

        static::deleted(function ($model) {
            $model-> deleteCacheTicket();
        });
    }
    // Các phương thức, quan hệ và logic thêm có thể được định nghĩa ở đây
    public function deleteCacheTicket()
    {
        $keys = Redis::keys(TicketCacheKeys::ALL_TICKET_FOR_USER ->value . $this->user_id . '*');
        redis::del(TicketCacheKeys::ALL_TICKET_FOR_ADMIN->value . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }
    public function deleteCacheTicketById()
    {
        $keys = Redis::keys(TicketCacheKeys::TICKET_BY_ID->value . $this->user_id . 'ticketID' . $this->id);
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }
}
