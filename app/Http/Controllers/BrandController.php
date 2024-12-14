<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BrandController extends Controller
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
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function import(Brand $brand){

        $url = 'https://rossmann-customer-api.retail.az/api/Products/markList';
        $apiKey = '09c7bd69-9598-42ed-8d83-cf65d59bb2f9';

        $response = Http::withHeaders([
            'api_key' => $apiKey,
        ])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            $startTime = microtime(true);
            $this->insertBrands($data['data']);
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            return response()->json(['message' => 'Data inserted successfully in '.$executionTime.' seconds']);
        } else {
            return response()->json(['error' => 'Unable to fetch data'], $response->status());
        }
    }

    private function insertBrands(array $brands)
    {
        $batchSize = 500; // Number of records to insert per batch
        $brandData = [];

        foreach ($brands as $brand) {

            // Prepare the brand data for batch insert
            $brandData[] = [
                'code' => $brand['markCode'],
                'name' => $brand['markName'],
                'slug' => Str::of($brand['markName'])->slug('-'),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // If the batch size is reached, insert the batch and reset the array
            if (count($brandData) == $batchSize) {
                DB::table('brands')->insert($brandData);
                $brandData = [];
            }
        }

        // Insert any remaining records
        if (!empty($brandData)) {
            DB::table('brands')->insert($brandData);
        }
    }
}
