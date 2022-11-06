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


Route::get('/',[\App\Http\Controllers\HomeController::class,'home']);
Route::get('contractors',[\App\Http\Controllers\HomeController::class,'contractors'])->name('contractors');
Route::get('become-a-contractor',[\App\Http\Controllers\HomeController::class,'BecomeContractorFrom'])->name('become.contractor');
Route::post('become-a-contractor',[\App\Http\Controllers\HomeController::class,'BecomeContractor'])->name('become.contractor');

Route::get('register',[LoginController::class,'registerForm'])->name('register');
Route::post('register',[LoginController::class,'register'])->name('register');
Route::get('login',[LoginController::class,'loginForm'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
