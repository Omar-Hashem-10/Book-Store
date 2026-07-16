<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('dashboard');

Route::resource('/discounts', DiscountController::class);
Route::resource('/categories', CategoryController::class);
Route::post('/add/discount/{category}', [CategoryController::class, 'addDiscount'])->name('category.add.discount');
