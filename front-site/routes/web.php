<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LiveNewsController;
use App\Http\Controllers\LocalNewsController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SingleNewsController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\WeController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\SearchController;
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

Route::get('/test', function (){
    return view('Pages.TestPage');
});

Route::get('/', [HomeController::class, "Page"]);

Route::get('/Category/National', function () {
    return view('Pages.CategoryPage');
});

Route::get('/LocalNews', [LocalNewsController::class,"Page"]);
Route::get('/get-trending-news/{id}', [TrendingController::class, "Page"]);

Route::get('/Archive', [\App\Http\Controllers\ArchiveController::class, "Page"]);

Route::get('/we',[WeController::class, "Page"]);
Route::get('/SingleNews', function (){
    return view('Pages.SingleNewsPage');
});

Route::get('/get-news/{NewsID}', [SingleNewsController::class, "Page"]);

Route::get('/get-news-by-category/{CategoryId}/{SubCategoryId?}', [CategoryController::class, "Page"]);
Route::get('/get-news-by-sub-category/{SubCategoryId}', [SubCategoryController::class, "Page"]);
Route::get('/get-live-news/{newsID}',[LiveNewsController::class, "Page"]);

Route::get('/privacy-policy', [PrivacyController::class, "Page"]);

Route::get('/terms-and-condition',[TermsController::class, "Page"]);

Route::get('/advertise', [AdvertiseController::class, "Page"]);

Route::get('/communication',[CommunicationController::class,"Page"]);

Route::get('/about', [AboutController::class, "Page"]);
Route::get('/search/{title}', [SearchController::class, "Page"]);
