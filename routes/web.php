<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::get('/',function (){
   return view('welcome');
});

Route::get('importCat', [CategoryController::class, "import"])->name('importCat');
Route::get('importProduct', [ProductController::class, "import"])->name('importProduct');
Route::get('importBrand', [BrandController::class, "import"])->name('importBrand');
