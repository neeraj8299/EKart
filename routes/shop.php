<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::resource('/cart', CartController::class);

Route::resource('/checkout', PaymentController::class);
