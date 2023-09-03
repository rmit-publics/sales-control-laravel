<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class, 'login']);
Route::post('/login',[UserController::class, 'authenticate']);

Route::middleware(['web'])->group(function(){
    Route::get('/user/getSellers/{store_id}',[UserController::class, 'getSeller']);
    Route::get('/store/getStore/{region_id}',[StoreController::class, 'getStore']);
    Route::get('/sale/create',[SaleController::class, 'create']);
    Route::get('/sale/create',[SaleController::class, 'create']);
    Route::post('/sale/create',[SaleController::class, 'store']);
    Route::get('/dashboard',[DashboardController::class, 'index']);
});
