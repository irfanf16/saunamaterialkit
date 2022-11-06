<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StockManagementController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkshopController;
use App\Http\Controllers\LoginController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
//************************************** Start Admin Routes *************************************** //

Route::redirect('/','systemUser');
Route::group(['prefix' => 'systemUser'], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::redirect('/', 'systemUser/login');
        Route::get('login', [LoginController::class, 'loginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::redirect('/', 'admin/dashboard');
        Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('workshop', WorkshopController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('products', ProductController::class);
        Route::resource('stocks', StockManagementController::class);
        Route::resource('banners', BannerController::class);
    });
});

//************************************** End Admin Routes *************************************** //


//************************************** Start Workshop Routes *************************************** //

Route::group(['prefix' => 'workshop'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::redirect('/', 'workshop/dashboard');
        Route::get('dashboard', [\App\Http\Controllers\Workshop\HomeController::class, 'index'])->name('workshop.dashboard');
        Route::resource('role', \App\Http\Controllers\Workshop\RoleController::class);
        Route::resource('user', \App\Http\Controllers\Workshop\UserController::class);
        Route::resource('service', \App\Http\Controllers\Workshop\ServiceController::class);
        Route::resource('holidays', \App\Http\Controllers\Workshop\WorkshopHolidayController::class);
        Route::resource('product', \App\Http\Controllers\Workshop\StockManagementController::class);

    });
});

//************************************** End Workshop Routes *************************************** //
