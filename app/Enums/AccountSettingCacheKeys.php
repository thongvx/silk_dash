<?php
namespace App\Enums;

//Include Key Prefix
enum AccountSettingCacheKeys: string
{
    case ALL_ACCOUNT_SETTING = 'all_account_setting';
    case GET_ACCOUNT_SETTING_BY_USER_ID = 'account_setting_by_user_id:';

    case All_PlayerSetting_For_User = 'all_player_setting_for_user:';

    case All_Activity_For_User = 'all_activity_for_user:';
}
