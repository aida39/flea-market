<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


Route::controller(ItemController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/item/{id}', 'detail');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/purchase/{id}', 'showPurchasePage');
    Route::post('/purchase/{id}', 'submitPurchase');
    Route::get('/purchase/address/{id}', 'showAddressForm');
    Route::post('/purchase/address/{id}', 'storeAddress');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'getRegister');
    Route::post('/register', 'postRegister');

    Route::get('/login', 'getLogin');
    Route::post('/login', 'postLogin');
    Route::get('/logout', 'getLogout')->middleware('auth');
});

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/mypage', 'mypage');
    Route::get('/mypage/profile', 'editProfile');
    Route::post('/mypage/profile', 'updateOrCreateProfile');
});