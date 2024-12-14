<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $home = Home::first();

        $brands = Brand::where('is_home',true)->get()
        ->map(function($item) use ($acceptLanguage) {
            return [
                'slug' => $item->slug,
                'name' => $item->name,
                'image' => url('uploads/' . $item->image),
            ];
        });;

        $home_data = [
            'seo_title' => $home->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $home->{'seo_desc_' . $acceptLanguage},
            'page_name' => $home->{'page_name_' . $acceptLanguage},
            'page_title' => $home->{'page_title_' . $acceptLanguage},
            'page_desc' => $home->{'page_desc_' . $acceptLanguage},
            'slug' => $home->slug,
        ];
        $sliders = $home->sliders->map(function ($slider) use ($acceptLanguage) {

            return [
                'title' => $slider->{'title_'.$acceptLanguage},
                'desc' => $slider->{'desc_'.$acceptLanguage},
                'image_first' => url('uploads/' . $slider->image_first),
                'image_second' => url('uploads/' . $slider->image_second),
                'link_title' => $slider->{'link_title_'.$acceptLanguage},
                'link' => $slider->link,
            ];
        });

        $banners = $home->banners->map(function ($banner) use ($acceptLanguage) {

            return [
                'type' => $banner->type,
                'image' => url('uploads/' . $banner->{'image_'.$acceptLanguage}),
                'image_mobile' => url('uploads/' . $banner->{'image_mobile_'.$acceptLanguage}),
                'link' => $banner->link,
            ];
        });

        return response()->json([
            'home' => $home_data,
            'sliders' => $sliders,
            'banners' => $banners,
            'brands' => $brands
        ]);
    }
}
