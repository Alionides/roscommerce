<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function navigation(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $title = 'title_' . $acceptLanguage;
        $data = Navigation::first();

        $data_response = [];

        $topnav = collect($data->top_nav);
        $data_response['topnav'] = $topnav->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();


        $red_nav_top = collect($data->red_nav_top);
        $data_response['red_nav_top'] = $red_nav_top->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();


//        $red_nav_bottom = collect($data->red_nav_bottom);
//        $data_response['red_nav_bottom'] = $red_nav_bottom->filter(function ($item) {
//            return $item['active'] == 1;
//        })->map(function ($item) use ($title) {
//            return [
//                'title' => $item[$title],
//                'slug' => $item['slug'],
//                'active' => $item['active']
//            ];
//        })->values()->all();
        $dynamicPage = DynamicPage::where('active', 1)->get()
        ->map(function ($dynamicPage) use($acceptLanguage) {
            return [
                'title' => $dynamicPage->{'page_title_' . $acceptLanguage},
                'slug_az' => $dynamicPage->slug_az,
                'slug_en' => $dynamicPage->slug_en,
                'slug_ru' => $dynamicPage->slug_ru,
            ];
        });

        $data_response['red_nav_bottom'] = $dynamicPage;


        $footer_about_nav = collect($data->footer_about_nav);
        $footer_about_nav_title = 'footer_about_nav_title_' . $acceptLanguage;
        $data_response['footer_about_nav']['title'] = $data->$footer_about_nav_title;
        $data_response['footer_about_nav']['data'] = $footer_about_nav->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();


        $footer_customer_nav = collect($data->footer_customer_nav);
        $footer_customer_nav_title = 'footer_customer_nav_title_' . $acceptLanguage;
        $data_response['footer_customer_nav']['title'] = $data->$footer_customer_nav_title;
        $data_response['footer_customer_nav']['data'] = $footer_customer_nav->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();


        $footer_rossmanclub_nav = collect($data->footer_rossmanclub_nav);
        $footer_rossmanclub_nav_title = 'footer_rossmanclub_nav_title_' . $acceptLanguage;
        $data_response['footer_rossmanclub_nav']['title'] = $data->$footer_rossmanclub_nav_title;
        $data_response['footer_rossmanclub_nav']['data'] = $footer_rossmanclub_nav->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();


        $footer_rules_nav = collect($data->footer_rules_nav);
        $footer_rules_nav_title = 'footer_rules_nav_title_' . $acceptLanguage;
        $data_response['footer_rules_nav']['title'] = $data->$footer_rules_nav_title;
        $data_response['footer_rules_nav']['data'] = $footer_rules_nav->filter(function ($item) {
            return $item['active'] == 1;
        })->map(function ($item) use ($title) {
            return [
                'title' => $item[$title],
                'slug' => $item['slug'],
                'active' => $item['active']
            ];
        })->values()->all();





        return response($data_response);
    }
}
