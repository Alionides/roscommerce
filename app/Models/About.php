<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $casts = [
        'links' =>'json',
    ];

    public function setSliderAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['slider'] = json_encode($pictures);
        }
    }

    public function getSliderAttribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
