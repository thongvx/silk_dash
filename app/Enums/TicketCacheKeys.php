<?php
namespace App\Enums;

//Include Key Prefix
enum TicketCacheKeys: string
{
    case ALL_TICKET_FOR_USER = 'all_user_ticket:';

    case TICKET_BY_ID = 'ticket:';

}
