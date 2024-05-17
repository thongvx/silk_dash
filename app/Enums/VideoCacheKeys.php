<?php
namespace App\Enums;

//Include Key Prefix
enum VideoCacheKeys: string
{
    case ALL_VIDEO_FOR_USER = 'all_user_video:';
    case GET_PLAYER_FOR_VIDEO = 'player_video:';

}
