<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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
    Route::get('/', 'index');
    Route::get('/item/{id}', 'showDetail');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'getRegister');
    Route::post('/register', 'postRegister');

    Route::get('/login', 'getLogin');
    Route::post('/login', 'postLogin');
    Route::get('/logout', 'getLogout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/mypage', 'mypage');
});