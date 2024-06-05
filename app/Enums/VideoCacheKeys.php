<?php
namespace App\Enums;

//Include Key Prefix
enum VideoCacheKeys: string
{
    case ALL_VIDEO_FOR_USER = 'all_user_video:';
    case GET_PLAYER_FOR_VIDEO = 'player_video:';

    case All_Folder_For_User = 'all_folder_for_user:';

    case ALL_ENCODER_TASKS = 'all_encoder_tasks:';
}
