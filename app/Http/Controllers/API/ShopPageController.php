<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShopItem;
use App\Models\ShopPage;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
    public function shopPage(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $shopPage = ShopPage::first();

        $shopPageData = [
            'id' => $shopPage->id,
            'seo_title' => $shopPage->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $shopPage->{'seo_desc_' . $acceptLanguage},
            'page_name' => $shopPage->{'page_name_' . $acceptLanguage},
            'page_title' => $shopPage->{'page_title_' . $acceptLanguage},
            'page_desc' => $shopPage->{'page_desc_' . $acceptLanguage},
            'slug' => $shopPage->slug,
            'map' => $shopPage->map,
            'links' => $shopPage->links,
            'top_banner_title' => $shopPage->{'top_banner_title_' . $acceptLanguage},
            'top_banner_desc' => $shopPage->{'top_banner_desc_' . $acceptLanguage},
            'top_banner_image' => url('uploads/'.$shopPage->top_banner_image),
            'top_banner_link' => $shopPage->top_banner_link,
        ];

        $shopItems = ShopItem::where('active',true)->get()
        ->map(function($item) use($acceptLanguage){
            return [
            'title' => $item->{'title_' . $acceptLanguage},
            'address' => $item->{'address_' . $acceptLanguage},
            'open' => $item->open,
            'close' => $item->close,
            'long' => $item->long,
            'lat' => $item->lat
            ];
        });

        return response()->json([
            'shopPage'=> $shopPageData,
            'shopItem'=> $shopItems,
        ]);
    }
}
