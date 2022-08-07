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

    Route::prefix('others_say')->group(function () {

        Route::get('/', ['App\Http\Controllers\OthersSayController', 'index'])->name('all_others_say');
        Route::get('/create', ['App\Http\Controllers\OthersSayController', 'create']);
        Route::post('/store', ['App\Http\Controllers\OthersSayController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\OthersSayController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\OthersSayController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\OthersSayController', 'destroy']);

    });

    Route::prefix('gallery')->group(function () {

        Route::get('/', ['App\Http\Controllers\GalleryController', 'index'])->name('all_gallery');
        Route::get('/create', ['App\Http\Controllers\GalleryController', 'create']);
        Route::post('/store', ['App\Http\Controllers\GalleryController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\GalleryController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\GalleryController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\GalleryController', 'destroy']);

    });

    Route::prefix('staff')->group(function () {

        Route::get('/', ['App\Http\Controllers\StaffController', 'index'])->name('all_staff');
        Route::get('/create', ['App\Http\Controllers\StaffController', 'create']);
        Route::post('/store', ['App\Http\Controllers\StaffController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\StaffController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\StaffController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\StaffController', 'destroy']);

    });

    Route::prefix('carousel')->group(function () {

        Route::get('/', ['App\Http\Controllers\CarouselController', 'index'])->name('all_carousel');
        Route::get('/create', ['App\Http\Controllers\CarouselController', 'create']);
        Route::post('/store', ['App\Http\Controllers\CarouselController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\CarouselController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\CarouselController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\CarouselController', 'destroy']);

    });

    Route::prefix('annual_reports')->group(function () {

        Route::get('/', ['App\Http\Controllers\AnnualReportsController', 'index'])->name('all_annual_reports');
        Route::get('/create', ['App\Http\Controllers\AnnualReportsController', 'create']);
        Route::post('/store', ['App\Http\Controllers\AnnualReportsController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\AnnualReportsController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\AnnualReportsController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\AnnualReportsController', 'destroy']);

    });

    Route::prefix('donations')->group(function () {
        Route::get('/', ['App\Http\Controllers\DonationsController', 'index'])->name('all_donations');
        Route::get('/create', ['App\Http\Controllers\DonationsController', 'create']);
        Route::post('/store', ['App\Http\Controllers\DonationsController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\DonationsController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\DonationsController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\DonationsController', 'destroy']);
    });

    Route::prefix('vacancies')->group(function () {
        Route::get('/', ['App\Http\Controllers\VacanciesController', 'index'])->name('all_vacancies');
        Route::get('/create', ['App\Http\Controllers\VacanciesController', 'create']);
        Route::post('/store', ['App\Http\Controllers\VacanciesController', 'store']);
        Route::get('/edit/{id}', ['App\Http\Controllers\VacanciesController', 'edit']);
        Route::put('/update/{id}', ['App\Http\Controllers\VacanciesController', 'update']);
        Route::delete('/delete/{id}', ['App\Http\Controllers\VacanciesController', 'destroy']);
    });


});


Route::get('/', ['App\Http\Controllers\HomePageController', 'setHomePage']);
//news
Route::get('/news', ['App\Http\Controllers\NewsController', 'get_public_news']);
Route::get('/news/{id}', ['App\Http\Controllers\NewsController', 'get_single_public_news']);

Route::get('/projects', ['App\Http\Controllers\ProjectsController', 'get_public_projects']);
Route::get('/projects/{id}', ['App\Http\Controllers\ProjectsController', 'get_single_public_projects']);

Route::get('/gallery', ['App\Http\Controllers\GalleryController', 'get_public_gallery']);
Route::get('/gallery', ['App\Http\Controllers\GalleryController', 'get_public_gallery']);
Route::get('/our_staff', ['App\Http\Controllers\StaffController', 'get_all_public_staff']);
Route::get('/contact_us', ['App\Http\Controllers\HomePageController', 'contact_us']);
Route::get('/about', ['App\Http\Controllers\HomePageController', 'get_public_about_page']);

Route::get('/annual_reports', ['App\Http\Controllers\AnnualReportsController', 'get_public_annual_reports']);
Route::get('/annual_reports/{id}', ['App\Http\Controllers\AnnualReportsController', 'get_single_public_projects']);

Route::get('/donations', ['App\Http\Controllers\DonationsController', 'get_public_donations']);
Route::get('/donations/{id}', ['App\Http\Controllers\DonationsController', 'get_single_public_donation']);

