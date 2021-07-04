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

Route::view('/', 'welcome');

Route::get('/portfolio', 'PortfolioController@index');
Route::get('/download', 'PortfolioController@download');

Route::resource('/skills', 'SkillController');
Route::resource('/testimonials', 'TestimonialController');

Route::prefix('cv')->group(function () {
    Route::get('/create', 'CvController@create')->name('cv.create');
    Route::post('/store', 'CvController@store')->name('cv.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
