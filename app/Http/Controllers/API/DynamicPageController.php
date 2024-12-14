<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    public function dynamicPage(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $slugColumn = 'slug_' . $acceptLanguage;
        $slug = $request->input('slug');
        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $dynamicPage = DynamicPage::where($slugColumn, $slug)->where('active', 1)->first();

        $dynamicPageData = [
            'id' => $dynamicPage->id,
            'seo_title' => $dynamicPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $dynamicPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $dynamicPage->{'page_name_' . $acceptLanguage},
            'page_title' => $dynamicPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $dynamicPage->{'page_desc_' . $acceptLanguage},
//            'slug' => $dynamicPage->{'slug_' . $acceptLanguage},
            'slug_az' => $dynamicPage->slug_az,
            'slug_en' => $dynamicPage->slug_en,
            'slug_ru' => $dynamicPage->slug_ru,
            'links' => $dynamicPage->links,
            'top_banner_title' => $dynamicPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $dynamicPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$dynamicPage->top_banner_image),
            'top_banner_link' => $dynamicPage->top_banner_link,
        ];

        return response($dynamicPageData);

    }
}
