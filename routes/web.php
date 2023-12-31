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

Route::get('/',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/logout',[UserController::class, 'logout']);
    Route::get('/user/getSellers/{store_id}',[UserController::class, 'getSeller']);
    Route::get('/store/getStoreByRegion/{region_id}',[StoreController::class, 'getStoreByRegion']);
    Route::get('/store/getStoreByManager/{manager_id}',[StoreController::class, 'getStoreByManager']);
    Route::get('/store/getStore/{region_id}',[StoreController::class, 'getStoreByRegion']);
    Route::post('/sales',[SaleController::class, 'search']);
    Route::get('/sales',[SaleController::class, 'index']);
    Route::get('/sale/create',[SaleController::class, 'create']);
    Route::get('/sale/create/{sale}',[SaleController::class, 'show']);
    Route::post('/sale/create',[SaleController::class, 'store']);
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::post('/dashboard',[DashboardController::class, 'search']);
});
