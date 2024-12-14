<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogItem extends Model
{
    use HasFactory;

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
