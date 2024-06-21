<?php

namespace App\Models;

use App\Enums\VideoCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = [
        'user_id', // ID của người dùng
        'name_folder', // Tên thư mục
        'number_file', // Số lượng file
        'soft_delete', // Cờ soft delete
    ];
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            if ($model->isDirty('number_file')) {
                $model->deleteCacheFolder();
            }
        });

        static::deleted(function ($model) {
            if (!$model->isDirty('number_file')) {
                $model-> deleteCacheFolder();
            }

        });
    }
    // Các phương thức, quan hệ và logic thêm có thể được định nghĩa ở đây
    public function deleteCacheFolder()
    {
        $keys = Redis::keys(VideoCacheKeys::All_Folder_For_User->value . $this->user_id . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }
}
