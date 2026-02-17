<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\websiteController;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::middleware(['auth'])->group(function () {
    
Route::get('/', [adminController::class, 'dashboard']);

// for category
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::post('/admin/category', [CategoryController::class, 'store']);
Route::post('/admin/category/delete', [CategoryController::class, 'remove']);
Route::post('/admin/category/edit', [CategoryController::class,'edit']);


// for subcategory
Route::get('/admin/subcategory', [SubCategoryController::class, 'index']);
Route::post('/admin/subcategory', [SubCategoryController::class, 'store']);
Route::post('/admin/subcategory/delete', [SubCategoryController::class, 'remove']);


// for tax
Route::get('/admin/tax', [TaxController::class, 'index']);
Route::post('/admin/tax', [TaxController::class, 'store']);
Route::post('/admin/tax/delete', [TaxController::class, 'remove']);
Route::post('/admin/tax/edit', [TaxController::class, 'edit']);


// for unit
Route::get('/admin/unit', [UnitController::class, 'index']);
Route::post('/admin/unit', [UnitController::class, 'store']);
Route::post('/admin/unit/delete', [UnitController::class, 'remove']);
Route::post('/admin/unit/edit', [UnitController::class, 'edit']);


// for product
Route::get('/admin/product', [ProductController::class, 'index']);
Route::post('/admin/product', [ProductController::class, 'store']);
Route::post('/admin/product/delete', [ProductController::class, 'remove']);
Route::post('/admin/product/edit', [ProductController::class, 'edit']);

} );
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);





//for website
Route::get('/master',[websiteController::class,'index']);

