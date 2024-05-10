<?php

use App\Http\Controllers\AdvertsController;
use App\Http\Controllers\AdvertsImagesController;
use App\Http\Controllers\AdvertsPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteConfigsController;
use App\Http\Controllers\UsersController;
use App\Models\Adverts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// KAVİ  WEB SİTE ROUTES//

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/iletisim', function () {
    return view('front.pages.contact');
})->name('contact');

Route::prefix('ilanlar')->get('detay', function () {
    return view('front.pages.advertdetail');
})->name('advertdetail');


Route::get('/ilanlar', [AdvertsPageController::class, 'index'])->name('ilanlar');
Route::get('/ilandetay/{advert}', [AdvertsPageController::class, 'getAdvert'])->name('ilandetay');
//Route::resource('ilanlar',AdvertsPageController::class);
Route::get('/bloglar', [BlogsController::class, 'page'])->name('bloglar');
Route::get('/bloglar/{slug}', [BlogsController::class, 'getBlog'])->name('blog');


Route::prefix('admin')->get('/login', function () {
    return view('panel.pages.login');
})->name('login');

// END KAVİ //

// ADMİN //
    // AUTH //
    Route::prefix('admin')->post('login', [AuthController::class, 'loginCheck'])->name('loginHandle');
    Route::get('logout', [AuthController::class, 'logout'])->name('logoutHandle');
        Route::middleware('isLogin')->prefix('admin')->get('/', function(){
                 return view('panel.layouts.master');
        })->name('admin');
    // END AUTH //

   
Route::prefix('admin')->name('admin.')->group(function() {
     Route::group(['middleware' => 'isLogin'], function(){
        Route::group(['middleware' => 'isAdmin'], function(){
            Route::resource('users',UsersController::class);
            Route::get('/configs', [SiteConfigsController::class, 'index'])->name('siteconfigs');
            Route::put('/configs/update', [SiteConfigsController::class, 'update'])->name('siteconfigsupdate');
            Route::get('/configs/update', [SiteConfigsController::class, 'imageDelete'])->name('imageDelete');
        });
        Route::get('/bbb', function () {
            return view('front.pages.advert');
        });
        Route::resource('advertsimages',AdvertsImagesController::class);
        Route::resource('adverts',AdvertsController::class);
        Route::resource('blogs',BlogsController::class);
      
     });
});
//Route::prefix('admin')->get('/', [AuthController::class, 'reg']);
