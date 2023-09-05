<?php

use App\Http\Controllers\Api\SaleApiController;
use App\Http\Controllers\Api\UserApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[UserApiController::class, 'login']);

Route::middleware(['auth:api'])->group(function(){
    Route::get('/sales',[SaleApiController::class, 'sales']);
    Route::get('/sale/{sale}',[SaleApiController::class, 'show']);
    Route::post('/sale',[SaleApiController::class, 'create']);
});
