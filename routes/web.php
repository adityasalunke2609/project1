<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [adminController::class, 'dashboard']);

// for category
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::post('/admin/category', [CategoryController::class, 'store']);
Route::post('/admin/category/delete', [CategoryController::class, 'remove']);

// for subcategory
Route::get('/admin/subcategory', [SubCategoryController::class, 'index']);
Route::post('/admin/subcategory', [SubCategoryController::class, 'store']);
Route::post('/admin/subcategory/delete', [SubCategoryController::class, 'remove']);

// for tax
Route::get('/admin/tax', [TaxController::class, 'index']);
Route::post('/admin/tax', [TaxController::class, 'store']);

// for unit
Route::get('/admin/unit', [UnitController::class, 'index']);
Route::post('/admin/unit', [UnitController::class, 'store']);
Route::post('/admin/unit/delete', [UnitController::class, 'remove']);
Route::post('/admin/unit/edit', [UnitController::class, 'edit']);

// for product
Route::get('/admin/product', [ProductController::class, 'index']);
Route::post('/admin/product', [ProductController::class, 'store']);
