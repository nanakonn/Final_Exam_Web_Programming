<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home'
    ]);
})->middleware('guest')->name('index');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logoutScreen']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [ItemController::class, 'index'])->middleware('auth')->name('home');
Route::get('/detail/{id}', [ItemController::class, 'detail'])->middleware('auth');
Route::post('/detail/{id}', [OrderController::class, 'store']);

Route::get('/order', [OrderController::class, 'index'])->middleware('auth')->name('order');
Route::delete('/order/delete/{id}', [OrderController::class, 'delete']);
Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/order/success', [OrderController::class, 'index2'])->middleware('auth')->name('orderSuccess');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/profile/saved', [ProfileController::class, 'saved'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update']);

Route::get('/admin/account', [AdminController::class, 'index'])->middleware('admin')->name('maintenance');
Route::get('/admin/update/{id}', [AdminController::class, 'index2'])->middleware('admin')->name('update');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->middleware('admin');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');
