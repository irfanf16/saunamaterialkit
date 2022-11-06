<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('home',[\App\Http\Controllers\HomeController::class,'home']);
Route::get('contractors',[\App\Http\Controllers\HomeController::class,'contractors']);
Route::post('become-contractors',[\App\Http\Controllers\HomeController::class,'becomeContractors']);
Route::post('register',[\App\Http\Controllers\LoginController::class,'customerRegister']);
Route::post('login',[\App\Http\Controllers\LoginController::class,'customerLogin']);
