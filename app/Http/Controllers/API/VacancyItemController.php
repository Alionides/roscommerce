<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VacancyItem;
use Illuminate\Http\Request;

class VacancyItemController extends Controller
{
    public function vacancyItemDetail(Request $request){

        $acceptLanguage = $request->header('Accept-Language', 'az');
        $slugColumn = 'slug_' . $acceptLanguage;
        $slug = $request->input('slug');
        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $vacancyItem = VacancyItem::where($slugColumn, $slug)->where('active', 1)->first();

        $localizedvacancyItem = [
            'id' => $vacancyItem->id,
            'seo_title' => $vacancyItem['seo_title_' . $acceptLanguage],
            'seo_desc' => $vacancyItem['seo_desc_' . $acceptLanguage],
            'title' => $vacancyItem['title_' . $acceptLanguage],
            'slug_az' => $vacancyItem->slug_az,
            'slug_en' => $vacancyItem->slug_en,
            'slug_ru' => $vacancyItem->slug_ru,
            'text' => $vacancyItem['text_' . $acceptLanguage],
            'image' => url('uploads/' . $vacancyItem->image),
            'branch' => $vacancyItem->branch,
            'open' => $vacancyItem->open,
            'close' => $vacancyItem->close,
        ];

        return response($localizedvacancyItem);
    }
}
