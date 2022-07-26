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


Route::get('admin', ['App\Http\Controllers\AdminDashboardController', 'setDashboard']);
Route::get('/', ['App\Http\Controllers\HomePageController', 'setHomePage']);
//Route::get('/admin', ['App\Http\Controllers\AdminDashboardController', 'setDashboard'])->name('admin');

