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

        Route::get('/', ['App\Http\Controllers\UsersController', 'getUsers'])->name('all_users');
        Route::get('/showaddform', ['App\Http\Controllers\UsersController', 'showAddUsersForm']);
        Route::post('/store', ['App\Http\Controllers\UsersController', 'store_user']);
        Route::get('/view/{id}', ['App\Http\Controllers\UsersController', 'view_user']);
        Route::put('/update/{id}', ['App\Http\Controllers\UsersController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\UsersController', 'delete_user']);

    });

    Route::prefix('projects')->group(function () {

        Route::get('/', ['App\Http\Controllers\ProjectsController', 'index'])->name('all_projects');
        Route::get('/create', ['App\Http\Controllers\ProjectsController', 'create']);
        Route::post('/store', ['App\Http\Controllers\ProjectsController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\ProjectsController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\ProjectsController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\ProjectsController', 'destroy']);

    });

    Route::prefix('news')->group(function () {

        Route::get('/', ['App\Http\Controllers\NewsController', 'index'])->name('all_news');
        Route::get('/create', ['App\Http\Controllers\NewsController', 'create']);
        Route::post('/store', ['App\Http\Controllers\NewsController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\NewsController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\NewsController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\NewsController', 'destroy']);

    });

    Route::prefix('partners')->group(function () {

        Route::get('/', ['App\Http\Controllers\PartnersController', 'index'])->name('all_partners');
        Route::get('/create', ['App\Http\Controllers\PartnersController', 'create']);
        Route::post('/store', ['App\Http\Controllers\PartnersController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\PartnersController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\PartnersController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\PartnersController', 'destroy']);

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

