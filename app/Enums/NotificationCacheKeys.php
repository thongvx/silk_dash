<?php
namespace App\Enums;

//Include Key Prefix
enum NotificationCacheKeys: string
{
    case GET_ALl_NOTIFICATION_BY_USER_ID = 'notification_by_user_id:';

}
