<?php

namespace App\Http\Controllers\API\Redis;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function categoryProductGroup(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');
        $nameColumn = 'name_' . $acceptLanguage;
        $categoryId = $request->category_id;

        // Cache key based on the category ID and language
        $cacheKey = "category_product_{$categoryId}_{$acceptLanguage}";

        // Attempt to retrieve the category and products from Redis
        $data = Redis::get($cacheKey);

        if ($data) {
            // If data is found in Redis, decode it
            $response = json_decode($data, true);
        } else {
            // Fetch the category and its children from the database
            $category = Category::with('children')->findOrFail($categoryId);
            $response = $this->getCategoryProductGroupData($category, $nameColumn);

            // Store the data in Redis with an expiration time of 1 hour (3600 seconds)
            Redis::set($cacheKey, json_encode($response));
            Redis::expire($cacheKey, 3600);
        }

        return response()->json($response);
    }

    private function getCategoryProductGroupData($category, $nameColumn)
    {
        // Cache key for the category data
        $cacheKey = "category_data_{$category->id}_{$nameColumn}";

        // Attempt to retrieve the category data from Redis
        $data = Redis::get($cacheKey);

        if ($data) {
            // If data is found in Redis, decode it
            $categoryData = json_decode($data, true);
        } else {
            // Fetch products for the given category
            $products = Product::where('category_id', $category->id)
                ->paginate(10)
                ->toArray();

            // Prepare the response structure for the category
            $categoryData = [
                'id' => $category->id,
                'name' => $category->$nameColumn,
                'description' => $category->description,
                'parent_id' => $category->parent_id,
                'icon' => $category->icon,
                'active' => $category->active,
                'products' => [
                    'items' => $products['data'],
                    'pagination' => [
                        'total' => $products['total'],
                        'per_page' => $products['per_page'],
                        'current_page' => $products['current_page'],
                        'last_page' => $products['last_page'],
                        'next_page_url' => $products['next_page_url'],
                        'prev_page_url' => $products['prev_page_url'],
                    ],
                ],
                'children' => [],
            ];

            // Recursively fetch data for child categories
            foreach ($category->children as $child) {
                $categoryData['children'][] = $this->getCategoryProductGroupData($child, $nameColumn);
            }

            // Store the data in Redis with an expiration time of 1 hour (3600 seconds)
            Redis::set($cacheKey, json_encode($categoryData));
            Redis::expire($cacheKey, 3600);
        }

        return $categoryData;
    }

    public function categoryProduct(Request $request)
    {

        $acceptLanguage = $request->header('Accept-Language');
        $nameColumn = 'name_' . $acceptLanguage;
        $cacheKey = "category_{$request->category_id}_products";
        $data = Redis::get($cacheKey);

        if (!$data) {
            $category = Category::findOrFail($request->category_id);
            $products = Product::where('category_id', $request->category_id)
                ->paginate(10);
            $data = [
                'category' => [
                    'id' => $category->id,
                    'name' => $category->$nameColumn,
                    'description' => $category->description,
                    'parent_id' => $category->parent_id,
                    'icon' => $category->icon,
                    'active' => $category->active,
                ],
                'products' => $products->items(),
                'pagination' => [
                    'total' => $products->total(),
                    'per_page' => $products->perPage(),
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'next_page_url' => $products->nextPageUrl(),
                    'prev_page_url' => $products->previousPageUrl(),
                ]
            ];
            Redis::set($cacheKey, json_encode($data));
            Redis::expire($cacheKey, 3600);
        }else {
            // Data found in Redis, decode the JSON string to an array
            $data = json_decode($data, true);
        }

        return response()->json($data);
    }

    public function category(Category $category, Request $request){
        $acceptLanguage = $request->header('Accept-Language');

        $cacheKey = "category_{$acceptLanguage}";

        $data = Redis::get($cacheKey);

        if (!$data) {
            $nameColumn = 'name_' . $acceptLanguage;
            $categories = Category::all(
                'parent_id',
                'name_'.$acceptLanguage,
                'code',
                'icon',
                'active'
            );
            $data = $categories->map(function ($category) use ($nameColumn) {
                return [
                    'parent_id' => $category->parent_id,
                    'name' => $category->$nameColumn,
                    'code' => $category->code,
                    'icon' => $category->icon,
                    'active' => $category->active,
                ];
            });
            Redis::set($cacheKey, json_encode($data));
            Redis::expire($cacheKey, 3600);
        }else{
            $data = json_decode($data, true);
        }

        return response()->json($data);
    }











}
