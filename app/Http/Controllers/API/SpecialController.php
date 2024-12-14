<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Special;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function special(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $special = Special::first();

        $special_data = [
            'seo_title' => $special->{'seo_title_' . $acceptLanguage},
            'seo_desc' => $special->{'seo_desc_' . $acceptLanguage},
            'page_name' => $special->{'page_name_' . $acceptLanguage},
            'page_title' => $special->{'page_title_' . $acceptLanguage},
            'page_desc' => $special->{'page_desc_' . $acceptLanguage},
            'slug' => $special->slug,
        ];

        $products = Product::where('special', true)
            ->paginate(32);

        // Transform the collection to format the product data
//        $products->getCollection()->transform(function ($product) use ($acceptLanguage) {
        $items = $products->map(function ($product) use ($acceptLanguage) {
            // Parse json multiple images
            $images = $product->images;
            if (is_array($images)) {
                $images = array_map(function ($image) {
                    return url('uploads/' . $image);
                }, $images);

                $product->images = $images;
            }
            return [
                'id' => $product->id,
                'category_id' => $product->category_id,
                'code' => $product->code,
                'barcode' => $product->barcode,
                'listPrice' => $product->listPrice,
                'salePrice' => $product->salePrice,
                'name' => $product->{'name_' . $acceptLanguage},
                'slug_az' => $product->slug_az,
                'slug_en' => $product->slug_en,
                'slug_ru' => $product->slug_ru,
                'text' => $product->{'text_' . $acceptLanguage},
                'images' => $product->images,
                'markCode' => $product->markCode,
                'markName' => $product->markName,
                'active' => $product->active,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ];
        });

        return response()->json([
            'special_page' => $special_data,
            'products' => $items,
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'next_page_url' => $products->nextPageUrl(),
                'prev_page_url' => $products->previousPageUrl(),
            ]
        ]);
    }
}
