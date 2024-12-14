<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandPage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandPageController extends Controller
{
    public function brandPage(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $brandPage = BrandPage::first();

        $brandPageData = [
            'id' => $brandPage->id,
            'seo_title' => $brandPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $brandPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $brandPage->{'page_name_' . $acceptLanguage},
            'page_title' => $brandPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $brandPage->{'page_desc_' . $acceptLanguage},
            'slug' => $brandPage->{'slug_' . $acceptLanguage},
            'links' => $brandPage->links,
            'top_banner_title' => $brandPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $brandPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$brandPage->top_banner_image),
            'top_banner_link' => $brandPage->top_banner_link,
        ];

        $popular_brands = Brand::where([['active',1],['is_home',true]])->get()
            ->map(function($item){
                return [
                    'slug' => $item->slug,
                    'name' => $item->name,
                    'image' => url('uploads/' . $item->image),
                ];
            });

        $all_brands = Brand::where('active',1)
            ->whereRaw('LEFT(name, 1) NOT REGEXP "^[A-Za-z]"')
            ->get()
            ->map(function($item){
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                ];
            });

        return response()->json([
            'brandPage' => $brandPageData,
            'popular_brands' => $popular_brands,
            'all_brands' => $all_brands,

        ]);

    }
}
