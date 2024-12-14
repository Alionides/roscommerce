<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function import(Category $category){

        $url = 'https://rossmann-customer-api.retail.az/api/Products/categories';
        $apiKey = '09c7bd69-9598-42ed-8d83-cf65d59bb2f9';

        $response = Http::withHeaders([
            'api_key' => $apiKey,
        ])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            $startTime = microtime(true);
            $this->insertCategories($data['data']);
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            return response()->json(['message' => 'Data inserted successfully in '.$executionTime.' seconds']);
        } else {
            return response()->json(['error' => 'Unable to fetch data'], $response->status());
        }
    }

    private function insertCategories(array $categories, $parentId = 0)
    {
        foreach ($categories as $category) {
            // Insert the category into the database
            $id = DB::table('categories')->insertGetId([
                'parent_id' => $parentId,
                'code' => $category['code'],
                'name_az' => $category['name'],
                'name_en' => $category['name'],
                'name_ru' => $category['name'],
                'slug_az' => Str::of($category['name'])->slug('-'),
                'slug_en' => Str::of($category['name'])->slug('-'),
                'slug_ru' => Str::of($category['name'])->slug('-'),
                'icon' => $category['icon'] ?? null,
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Recursively insert subcategories
            if (isset($category['subCategory']) && !empty($category['subCategory'])) {
                $this->insertCategories($category['subCategory'], $id);
            }
        }
    }

}
