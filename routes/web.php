<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//admin
// Route::get('/', [HomeController::class, 'checkUserType']);

Route::get('admin/dashboard', function(){
    return view('admin');
})->name('admin.dashboard');

Route::get('/user/dashboard', function(){
    return view('user');
})->name('user.dashboard');


Route::resource('products',ProductController::class);

Route::resource('checkout',CheckOutController::class);
//cart
Route::get('/', [HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search']);

Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [HomeController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [HomeController::class, 'remove'])->name('remove_from_cart');


Route::get('messenger', [CheckOutController::class, 'messenger'])->name('messenger');
//xu li checkout
// Route::get('checkout', [CheckOutController:: class, 'index']);
// Route::post('store', [CheckOutController:: class, 'store']);

// Route::post('store', [CheckOutController:: class, 'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});
