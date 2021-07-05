<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\HomeController;

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

Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/download', [PortfolioController::class, 'download']);

Route::resource('/skills', 'SkillController');
Route::resource('/testimonials', 'TestimonialController');

Route::prefix('cv')->group(function () {
    Route::get('/create', [CvController::class, 'create'])->name('cv.create');
    Route::post('/store', [CvController::class, 'store'])->name('cv.store');
});

Route::post('/send-mail', [MailController::class, 'sendMail']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
