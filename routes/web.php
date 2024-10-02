<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterMenuController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Models\Merchants;
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


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/login', 'loginPage')->name('admin.loginPage')->middleware(GuestMiddleware::class);
    Route::get('/admin/register', 'register')->name('admin.register')->middleware(GuestMiddleware::class);
    Route::controller(UserController::class)->group(function(){
        Route::post('/admin/register', 'storeMerchant')->name('admin.postregistermerchant');
        Route::post('/admin/login', 'loginMerchant')->name('admin.postloginmerchant');
        Route::get('/admin/logout', 'logoutMerchant')->name('admin.logout');
    });

    Route::middleware(AuthMiddleware::class)->group(function(){
        Route::get('/', 'index')->name('admin.index');
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin/profilemerchant', 'index')->name('admin.profilemerchant');
        Route::get('/admin/mastermenu', 'mastermenu')->name('admin.mastermenu');
        Route::get('/admin/mastermenu/{id?}', 'mastermenu')->name('admin.mastermenuedit');
        Route::get('/admin/orders', 'orders')->name('admin.orders');

        Route::controller(MerchantController::class)->group(function(){
            Route::post('/admin/merchant', 'store')->name('admin.storemerchant');

        });

        Route::controller(MasterMenuController::class)->group(function(){
            Route::post('/admin/mastermenu', 'store')->name('admin.storemastermenu');
            Route::post('/admin/mastermenu/edit', 'edit')->name('admin.editmastermenu');
            Route::get('/admin/mastermenu/delete/{id}', 'delete')->name('admin.deletemastermenu');
        });
    });

});

