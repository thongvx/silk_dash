<?php
namespace App\Enums;

//Include Key Prefix
enum UploadCacheKeys: string
{
    case All_Transfer = 'all_transfer:';
    case Transfer_By_ID = 'transfer:';

}
