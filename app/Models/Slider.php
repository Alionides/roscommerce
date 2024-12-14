<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'image_first',
        'image_second',
        'active',
    ];
    public function sliderable()
    {
        return $this->morphTo();
    }
}
