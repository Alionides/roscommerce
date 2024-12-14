<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VacancyAdvantage;
use App\Models\VacancyItem;
use App\Models\VacancyPage;
use App\Models\VacancySuccess;
use Illuminate\Http\Request;

class VacancyPageController extends Controller
{
    public function vacancyPage(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $vacancyPage = VacancyPage::first();

        $vacancyPageData = [
            'id' => $vacancyPage->id,
            'seo_title' => $vacancyPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $vacancyPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $vacancyPage->{'page_name_' . $acceptLanguage},
            'page_title' => $vacancyPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $vacancyPage->{'page_desc_' . $acceptLanguage},
            'slug' => $vacancyPage->slug,

            'top_section_title' => $vacancyPage->{'top_section_title_' . $acceptLanguage},
            'top_section_desc' => $vacancyPage->{'top_section_desc_' . $acceptLanguage},
            'top_section_image' => url('uploads/'. $vacancyPage->top_section_image),

            'bottom_section_image' => url('uploads/'. $vacancyPage->bottom_section_image),

            'top_banner_title' => $vacancyPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $vacancyPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$vacancyPage->top_banner_image),
            'top_banner_link' => $vacancyPage->top_banner_link,

            'bottom_banner_title' => $vacancyPage->{'bottom_banner_title_' . $acceptLanguage},
            'bottom_banner_desc' => $vacancyPage->{'bottom_banner_desc_' . $acceptLanguage},
            'bottom_banner_image' => url('uploads/' . $vacancyPage->bottom_banner_image),
            'bottom_banner_link' => $vacancyPage->bottom_banner_link,
        ];

        $vacancyItems = VacancyItem::where('active',true)->get()
            ->map(function($item) use($acceptLanguage){
                return [
                    'title' => $item->{'title_' . $acceptLanguage},
                    'image' => url('uploads/' . $item->image),
                    'slug_az' => $item->slug_az,
                    'slug_en' => $item->slug_en,
                    'slug_ru' => $item->slug_ru
                ];
            });

        $advantageItems = VacancyAdvantage::where('active',true)->get()
            ->map(function($item) use($acceptLanguage){
                return [
                    'title' => $item->{'title_' . $acceptLanguage},
                    'text' => $item->{'text_' . $acceptLanguage},
                    'image' => url('uploads/' . $item->image)
                ];
            });

        $successItems = VacancySuccess::where('active',true)->get()
            ->map(function($item) use($acceptLanguage){
                return [
                    'title' => $item->{'title_' . $acceptLanguage},
                    'text' => $item->{'text_' . $acceptLanguage},
                    'image' => url('uploads/' . $item->image)
                ];
            });

        return response()->json([
            'vacancyPage'=> $vacancyPageData,
            'vacancyItem'=> $vacancyItems,
            'advantageItem'=> $advantageItems,
            'successItem'=> $successItems,
        ]);

    }

    public function vacancies(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $vacancyPage = VacancyPage::first();

        $vacancyPageData = [
            'id' => $vacancyPage->id,
            'seo_title' => $vacancyPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $vacancyPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $vacancyPage->{'page_name_' . $acceptLanguage},
            'page_title' => $vacancyPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $vacancyPage->{'page_desc_' . $acceptLanguage},
            'slug' => $vacancyPage->slug,
        ];

        $vacancy = VacancyItem::where('active', true)->paginate(9);
        $vacancyItems = $vacancy->map(function ($item) use ($acceptLanguage) {

            return [
                'id' => $item->id,
                'title' => $item['title_' . $acceptLanguage],
                'text' => $item['text_' . $acceptLanguage],
                'image' => url('uploads/' . $item->image),
                'slug_az' => $item->slug_az,
                'slug_en' => $item->slug_en,
                'slug_ru' => $item->slug_ru,
            ];
        });

        return response()->json([
            'vacancyPage' => $vacancyPageData,
            'vacancy_items' => $vacancyItems,
            'pagination' => [
                'total' => $vacancy->total(),
                'per_page' => $vacancy->perPage(),
                'current_page' => $vacancy->currentPage(),
                'last_page' => $vacancy->lastPage(),
                'next_page_url' => $vacancy->nextPageUrl(),
                'prev_page_url' => $vacancy->previousPageUrl(),
            ],
        ]);
    }
}
