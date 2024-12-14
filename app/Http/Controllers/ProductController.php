<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function import()
    {
        // Replace with your actual API endpoint and API key
        $url = 'https://rossmann-customer-api.retail.az/api/products';
        $apiKey = '09c7bd69-9598-42ed-8d83-cf65d59bb2f9';

        $response = Http::withHeaders([
            'api_key' => $apiKey,
        ])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            $startTime = microtime(true);
            $this->insertProductsIntoDb($data['data']);
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            return response()->json(['message' => 'Products inserted successfully in '.$executionTime.' seconds']);
        } else {
            return response()->json(['error' => 'Unable to fetch data'], $response->status());
        }
    }

    private function insertProductsIntoDb(array $products)
    {
        $batchSize = 1000; // Number of records to insert per batch
        $productData = [];

        foreach ($products as $product) {
            // Find the category ID based on the category code
            $categoryId = DB::table('categories')
                ->where('code', $product['subCategoryNo3'])
                ->value('id');

            // Prepare the product data for batch insert
            $productData[] = [
                'category_id' => $categoryId,
                'code' => $product['code'],
                'barcode' => $product['barcode'] ?? null,
                'listPrice' => $product['listPrice'],
                'salePrice' => $product['salePrice'],
                'name_az' => $product['name'],
                'name_en' => $product['name'],
                'name_ru' => $product['name'],
                'slug_az' => Str::of($product['name'])->slug('-'),
                'slug_en' => Str::of($product['name'])->slug('-'),
                'slug_ru' => Str::of($product['name'])->slug('-'),
                'text_az' => $product['text_az'] ?? null,
                'text_en' => $product['text_en'] ?? null,
                'text_ru' => $product['text_ru'] ?? null,
                'images' => json_encode([$product['barcode'] ? 'images/' . $product['barcode'] . '.jpg' : null]),
                'markCode' => $product['markCode'],
                'markName' => $product['markName'],
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // If the batch size is reached, insert the batch and reset the array
            if (count($productData) == $batchSize) {
                DB::table('products')->insert($productData);
                $productData = [];
            }
        }

        // Insert any remaining records
        if (!empty($productData)) {
            DB::table('products')->insert($productData);
        }
    }

//    private function insertProductsIntoDb(array $products)
//    {
//        foreach ($products as $product) {
//            // Find the category ID based on the category code
//            $categoryId = DB::table('categories')
//                ->where('code', $product['subCategoryNo3'])
//                ->value('id');
//
//            // Insert the product into the database
//            DB::table('products')->insert([
//                'category_id' => $categoryId,
//                'code' => $product['code'],
//                'barcode' => $product['barcode'] ?? null,
//                'listPrice' => $product['listPrice'],
//                'salePrice' => $product['salePrice'],
//                'name_az' => $product['name'],
//                'name_en' => $product['name'],
//                'name_ru' => $product['name'],
//                'text_az' => $product['text_az'] ?? null,
//                'text_en' => $product['text_en'] ?? null,
//                'text_ru' => $product['text_ru'] ?? null,
//                'markCode' => $product['markCode'],
//                'markName' => $product['markName'],
//                'active' => 1,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//        }
//    }


}
