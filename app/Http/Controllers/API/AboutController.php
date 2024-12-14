<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(Request $request){
        $acceptLanguage = $request->header('Accept-Language');
//        $slugColumn = 'slug_' . $acceptLanguage;

//        $slug = $request->input('slug');
//        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data = About::first();

        $data->sec_1_image = $data->sec_1_image ? url('uploads/' . $data->sec_1_image) : null;
        $data->sec_2_image = $data->sec_2_image ? url('uploads/' . $data->sec_2_image) : null;
        $data->sec_3_image = $data->sec_3_image ? url('uploads/' . $data->sec_3_image) : null;

        $sections = [];
        $sec_1_name = 'sec_1_name_' . $acceptLanguage;
        $sec_1_title = 'sec_1_title_' . $acceptLanguage;
        $sec_1_desc = 'sec_1_desc_' . $acceptLanguage;
        $sections[0]= [
            'sec_name' => $data->$sec_1_name,
            'sec_title' => $data->$sec_1_title,
            'sec_desc' => $data->$sec_1_desc,
            'sec_image' => url($data->sec_1_image)
        ];
        $sec_2_name = 'sec_2_name_' . $acceptLanguage;
        $sec_2_title = 'sec_2_title_' . $acceptLanguage;
        $sec_2_desc = 'sec_2_desc_' . $acceptLanguage;
        $sections[1]= [
            'sec_name' => $data->$sec_2_name,
            'sec_title' => $data->$sec_2_title,
            'sec_desc' => $data->$sec_2_desc,
            'sec_image' => $data->sec_2_image,
            'sec_image' => url($data->sec_2_image)
        ];
        $sec_3_name = 'sec_3_name_' . $acceptLanguage;
        $sec_3_title = 'sec_3_title_' . $acceptLanguage;
        $sec_3_desc = 'sec_3_desc_' . $acceptLanguage;
        $sections[2]= [
            'sec_name' => $data->$sec_3_name,
            'sec_title' => $data->$sec_3_title,
            'sec_desc' => $data->$sec_3_desc,
            'sec_image' => url($data->sec_3_image)
        ];

        $statistics = [];

        $statistic_1_title = 'statistic_1_title_' . $acceptLanguage;
        $statistics[0] = [
            'count' => $data->statistic_1_count,
            'statistic_title' => $data->$statistic_1_title,
            'statistic_icon' => $data->statistic_1_icon,
        ];

        $statistic_2_title = 'statistic_2_title_' . $acceptLanguage;
        $statistics[1] = [
            'count' => $data->statistic_2_count,
            'statistic_title' => $data->$statistic_2_title,
            'statistic_icon' => $data->statistic_2_icon,
        ];

        $statistic_3_title = 'statistic_3_title_' . $acceptLanguage;
        $statistics[2] = [
            'count' => $data->statistic_3_count,
            'statistic_title' => $data->$statistic_3_title,
            'statistic_icon' => $data->statistic_3_icon,
        ];

        $statistic_4_title = 'statistic_4_title_' . $acceptLanguage;
        $statistics[3] = [
            'count' => $data->statistic_4_count,
            'statistic_title' => $data->$statistic_4_title,
            'statistic_icon' => $data->statistic_4_icon,
        ];

        $visions = [];

        $vision_1_title = 'vision_1_title_' . $acceptLanguage;
        $vision_1_desc = 'vision_1_desc_' . $acceptLanguage;
        $visions[0] = [
            'vision_title' => $data->$vision_1_title,
            'vision_desc' => $data->$vision_1_desc,
            'vision_image' => url('uploads/' . $data->vision_1_image)
        ];

        $vision_2_title = 'vision_2_title_' . $acceptLanguage;
        $vision_2_desc = 'vision_2_desc_' . $acceptLanguage;
        $visions[1] = [
            'vision_title' => $data->$vision_2_title,
            'vision_desc' => $data->$vision_2_desc,
            'vision_image' => url('uploads/' . $data->vision_2_image)
        ];


        $data->banner_image = $data->banner_image ? url('uploads/' . $data->banner_image) : null;
        $data->vision_1_image = $data->vision_1_image ? url('uploads/' . $data->vision_1_image) : null;
        $data->vision_2_image = $data->vision_2_image ? url('uploads/' . $data->vision_2_image) : null;

        $sliderImages = $data->slider;
        if (is_array($sliderImages)) {
            $sliderImages = array_map(function($image) {
                return url('uploads/' . $image);
            }, $sliderImages);

            $data->slider = $sliderImages;
        }
        $seo_title = 'seo_title_' . $acceptLanguage;
        $seo_desc = 'seo_desc_' . $acceptLanguage;
        $page_name = 'page_name_' . $acceptLanguage;
        $page_title = 'page_title_' . $acceptLanguage;
        $page_desc = 'page_desc_' . $acceptLanguage;
        $top_banner_title = 'top_banner_title_' . $acceptLanguage;
        $top_banner_desc = 'top_banner_desc_' . $acceptLanguage;
        $banner_title = 'banner_title_' . $acceptLanguage;
        $banner_desc = 'banner_desc_' . $acceptLanguage;

        $about = [
            'id' => $data->id,
            'seo_title' => $data->$seo_title,
            'seo_desc' => $data->$seo_desc,
            'page_name' => $data->$page_name,
            'page_title' => $data->$page_title,
            'page_desc' => $data->$page_desc,
//            'slug_az' => $data->slug_az,
//            'slug_en' => $data->slug_en,
//            'slug_ru' => $data->slug_ru,
            'sections' => $sections,
            'statistics' => $statistics,
            'slider' => $data->slider,
            'links' => $data->links,
            'visions' => $visions,
            'top_banner_title' => $data->$top_banner_title,
            'top_banner_desc' => $data->$top_banner_desc,
            'top_banner_image' => url('uploads/'.$data->top_banner_image),
            'top_banner_link' => $data->top_banner_link,
            'banner_title' => $data->$banner_title,
            'banner_desc' => $data->$banner_desc,
            'banner_image' => url($data->banner_image),
            'banner_link' => $data->banner_link

        ];

        return response($about);
    }
}
