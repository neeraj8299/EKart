<?php

use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->middleware(['auth', 'haveadminaccess'])->group(function () {
    Route::get('/dashboard', [AdminDashBoardController::class, 'dashboardView'])->middleware(['auth']);
    Route::resource('/products', ProductController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/user', AdminUserController::class);
});

Route::post('/update-profile',[ProfileController::class,'updateProfile']);

Route::get('/send-verification-link',[ProfileController::class,'sendLink']);
