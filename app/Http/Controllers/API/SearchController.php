<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function search(Request $request){
    $acceptLanguage = $request->header('Accept-Language', 'az');
    $keyword = $request->query('q');
    if($keyword ==''){
        return response()->json(['status' => 'error', 'message' => 'Keyword not found.'], 400);
    }
    $column = 'name_' . $acceptLanguage;
//        try {
            $products = Product::where($column, 'like', "%$keyword%")->paginate(32);
            $items = $products->map(function ($product) use ($acceptLanguage) {
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
                'products' => $items,
                'pagination' => [
                    'total' => $products->total(),
                    'per_page' => $products->perPage(),
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'next_page_url' => $products->nextPageUrl(),
                    'prev_page_url' => $products->previousPageUrl(),
                ],
                'status' => 'true'
            ],200);
//        } catch (\Exception $e) {
//            return response()->json([
//                'status' => 'error',
//                'message' => $e->getMessage()
//            ], Response::HTTP_INTERNAL_SERVER_ERROR);
//        }
    }
}
