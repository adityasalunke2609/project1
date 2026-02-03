<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [adminController::class,'dashboard']);

Route::get('/category', [CategoryController::class,'category']);
Route::post('/getvalue', [CategoryController::class, 'getvalue']);
Route::get('/save', [CategoryController::class, 'save'])->name('save.page');




Route::get('/subcategory', [SubCategoryController::class,'subcategory']);

Route::get('/tax', [TaxController::class,'tax']);

Route::get('/unit', [UnitController::class,'unit']);

