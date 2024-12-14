<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function productCategory()
    {
        return $this->belongsTo(Category::class,'product_category_id');
    }

}
