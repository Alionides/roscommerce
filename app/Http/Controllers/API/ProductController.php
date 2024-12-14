<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function productNewest(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $products = Product::where('active', true)
            ->orderBy('updated_at', 'desc')
            ->limit(24)
            ->get()
            ->map(function ($product) use ($acceptLanguage){

            // parse json multiple images

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
//                'slug' => $product->$slugColumn,
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

        return response($products);
    }

    public function productPopular(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $products = Product::where('popular', true)
            ->limit(24)
            ->get()
            ->map(function ($product) use ($acceptLanguage){

            // parse json multiple images

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
//                'slug' => $product->$slugColumn,
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

        return response($products);
    }

    public function productSpecial(Request $request){
        $acceptLanguage = $request->header('Accept-Language', 'az');

        $products = Product::where('special', true)
            ->limit(12)
            ->get()
            ->map(function ($product) use ($acceptLanguage){

                // parse json multiple images

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
//                'slug' => $product->$slugColumn,
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

        return response($products);
    }

    public function productDetail(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language', 'az');
        $nameColumn = 'name_' . $acceptLanguage;
        $slugColumn = 'slug_' . $acceptLanguage;
        $textColumn = 'text_' . $acceptLanguage;

        $slug = $request->input('slug');
        $slug = filter_var($slug, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $product = Product::where($slugColumn, $slug)
            ->where('active', true)
            ->firstOrFail();

        $images = $product->images;
        if (is_array($images)) {
            $images = array_map(function($image) {
                return url('uploads/' . $image);
            }, $images);

            $product->images = $images;
        }

        $category = $product->category;
        $breadcrumb = $this->buildBreadcrumb($category, $nameColumn, $slugColumn);

        $breadcrumb[] = [
            'title' => $product->$nameColumn,
            'slug_az' => $product->slug_az,
            'slug_en' => $product->slug_en,
        ];

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('active', true)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get()->map(function ($product) use ($nameColumn, $slugColumn, $textColumn) {

                $images = $product->images;
                if (is_array($images)) {
                    $images = array_map(function($image) {
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
                    'name' => $product->$nameColumn,
                    'slug' => $product->$slugColumn,
                    'text' => $product->$textColumn,
                    'images' => $product->images,
                    'markCode' => $product->markCode,
                    'markName' => $product->markName,
                    'active' => $product->active,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                ];
            });

        $productDetails = [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'code' => $product->code,
            'barcode' => $product->barcode,
            'listPrice' => $product->listPrice,
            'salePrice' => $product->salePrice,
            'name' => $product->$nameColumn,
//            'slug' => $product->$slugColumn,
            'slug_az' => $product->slug_az,
            'slug_en' => $product->slug_en,
            'slug_ru' => $product->slug_ru,
            'text' => $product->$textColumn,
            'images' => $product->images,
            'markCode' => $product->markCode,
            'markName' => $product->markName,
            'active' => $product->active,
            'breadcrumb' => $breadcrumb,
            'relatedProducts' => $relatedProducts,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
        ];

        return response($productDetails);
    }

    private function buildBreadcrumb($category, $nameColumn, $slugColumn)
    {
        $breadcrumb = [];

        while ($category) {
            $breadcrumb[] = [
                'title' => $category->$nameColumn,
                'slug' => $category->$slugColumn
            ];

            $category = $category->parent;
        }

        return array_reverse($breadcrumb);
    }

}
