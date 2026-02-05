<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [adminController::class,'dashboard']);

// for category 
Route::get('/category', [CategoryController::class,'category']);
Route::post('/save', [CategoryController::class, 'storecategory']);


// for subcategory 
Route::get('/subcategory', [SubCategoryController::class,'subcategory']);


// for tax 
Route::get('/tax', [TaxController::class,'tax']);
Route::post("/taxsave",[TaxController::class,'storetax']);
// Route::get("/taxsave/{taxName}",[UnitController::class,'taxsave']);



// for unit 
Route::get('/unit', [UnitController::class,'unit']);
Route::post("/save",[UnitController::class,'storeunit']);
// Route::get("/save/{unitName}",[UnitController::class,'save']);


// for product 
Route::get('/product', [ProductController::class,'product']);
