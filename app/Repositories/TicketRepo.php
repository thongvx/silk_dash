<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\TicketCacheKeys;

class TicketRepo extends BaseRepository
{
    function model()
    {
        return Ticket::class;
    }

    public function getAllTickets($userId)
    {
        $limit = 20;
        $key = TicketCacheKeys::ALL_TICKET_FOR_USER ->value . $userId . 'limit' . $limit;
        $tickets = Redis::get($key);
        if (isset($tickets)) {
            return unserialize($tickets);
        }

        $tickets = $this->model
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate($limit);

        Redis::setex($key, 259200, serialize($tickets));

        return $tickets;
    }
    public function getTicket($ticketID, $userId)
    {
        $key = TicketCacheKeys::TICKET_BY_ID->value . $userId . 'ticketID' . $ticketID;
        $tickets = Redis::get($key);
        if (isset($tickets)) {
            return unserialize($tickets);
        }

        $tickets = $this->model->where('user_id', $userId)
                    ->where('id', $ticketID)
                    ->first();

        Redis::setex($key, 259200, serialize($tickets));
        return $tickets;

    }
}
