<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
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
    Route::get('/search', 'search');
    Route::get('/sell', 'showListingForm')->middleware('auth');
    Route::post('/sell', 'storeItem')->middleware('auth');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comment/{id}', 'showCommentPage');
    Route::post('/comment/{id}', 'storeComment')->middleware('auth');
    Route::post('/comment/delete/{id}', 'deleteComment')->middleware('auth');
});

Route::controller(FavoriteController::class)->group(function () {
    Route::patch('/favorite/{id}', 'switchFavoriteStatus')->middleware('auth');
});

Route::controller(OrderController::class)->middleware('auth')->group(function () {
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
    Route::get('/mypage/profile', 'showProfileForm');
    Route::post('/mypage/profile', 'updateOrCreateProfile');
});