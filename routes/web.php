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

    Route::get('/admin/dashboard', [adminController::class, 'dashboard']);

    // for category
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::post('/admin/category/delete', [CategoryController::class, 'remove']);
    Route::post('/admin/category/edit', [CategoryController::class, 'edit']);

    // for subcategory
    Route::get('/admin/subcategory', [SubCategoryController::class, 'index']);
    Route::post('/admin/subcategory', [SubCategoryController::class, 'store']);
    Route::post('/admin/subcategory/delete', [SubCategoryController::class, 'remove']);

    // for tax
    Route::get('/admin/tax', action: [TaxController::class, 'index']);
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

});

route::get('/logout', function () {
    Auth::logout();

    return redirect('/login');
})->name('logout');

// for website routes
Route::get('/', [websiteController::class, 'index']);
Route::get('/shop', [websiteController::class, 'shop']);
Route::get('/blog', [websiteController::class, 'blog']);
Route::get('/contact', [websiteController::class, 'contact']);
Route::get('/about', [websiteController::class, 'about']);
Route::get('/blogDetails', [websiteController::class, 'blog_details']);
Route::get('/shopDetails', [websiteController::class, 'shop_details']);
Route::get('/shoppingCart', [websiteController::class, 'shopping_cart']);
Route::get('/checkOut', [websiteController::class, 'checkOut']);

Route::get('/editprofile', [websiteController::class, 'editprofile'])
    ->name('editprofile');

Route::post('/updateprofile', [websiteController::class, 'updateprofile'])
    ->name('updateprofile');
