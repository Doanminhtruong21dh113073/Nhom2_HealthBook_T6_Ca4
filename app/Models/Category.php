<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    // Mối quan hệ 1-n với model User: Mỗi danh mục thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Mối quan hệ 1-n với model Service: Mỗi danh mục có nhiều dịch vụ
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
