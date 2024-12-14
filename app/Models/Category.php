<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'code',
        'name',
        'icon',
        'active',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
