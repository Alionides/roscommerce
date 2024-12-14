<?php

namespace App\Models;

use App\Enums\BannerType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'bannerable_id',
        'bannerable_type',
        'type',
        'image_az',
        'image_mobile_az',
        'image_en',
        'image_mobile_en',
        'image_ru',
        'image_mobile_ru',
        'link',
        'active',
    ];

    protected $casts = [
        'type' => BannerType::class,
    ];

    public function bannerable()
    {
        return $this->morphTo();
    }
}
