<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    // Các phương thức, quan hệ và logic thêm có thể được định nghĩa ở đây
}
