<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard',['is_admin' => 'no','products' => Product::getAllProducts()]);
})->middleware(['auth','userAccess'])->name('dashboard');

require __DIR__ . '/auth.php';

require __DIR__ . '/shop.php';

require __DIR__ . '/admin.php';
