<?php

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
Route::prefix('admin')->group(function () {
    Route::get('/', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);
    Route::prefix('users')->group(function () {

        Route::get('/', ['App\Http\Controllers\UsersController', 'getUsers']);
        Route::get('/showaddform', ['App\Http\Controllers\UsersController', 'showAddUsersForm']);
        Route::post('/store', ['App\Http\Controllers\UsersController', 'store_user']);

    });


});


//Route::prefix('admin')->group(function () {
//Route::get('/users', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);
//Route::get('/admin2', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);
//    Route::get('/', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);

//});

//Route::get('admin', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);
Route::get('/', ['App\Http\Controllers\HomePageController', 'setHomePage']);
//Route::get('/admin', ['App\Http\Controllers\AdminDashboardController', 'setDashboard'])->name('admin');

