<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MailController;

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

Route::prefix('admin')->controller(LoginController::class)->group(function () {
    Route::middleware('guest.admin:admin')->group(function () {
        Route::get('/login', 'getLogin')->name('admin.login');
        Route::post('/login', 'postLogin');
    });

    Route::middleware('auth.admin:admin')->group(function () {
        Route::get('/logout', 'getLogout');
    });
});

Route::prefix('admin')->controller(AdminController::class)->middleware('auth.admin:admin')->group(
    function () {
        Route::get('/index', 'index');
    }
);

Route::prefix('admin')->controller(MailController::class)->group(
    function () {
        Route::get('/mail', 'showMailForm');
        Route::post('/mail', 'sendMail');
    }
);
