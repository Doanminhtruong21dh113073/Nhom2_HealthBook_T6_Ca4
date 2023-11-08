<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    // Mối quan hệ 1-n với model Category: Mỗi dịch vụ thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
