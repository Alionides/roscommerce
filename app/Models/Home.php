<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function sliders()
    {
        return $this->morphMany(Slider::class, 'sliderable');
    }
    public function banners()
    {
        return $this->morphMany(Banner::class, 'bannerable');
    }
}
