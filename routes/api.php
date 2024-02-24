<?php

use App\Http\Controllers\AppointmentApiController;
use App\Http\Controllers\ServiceApiController;
use App\Http\Controllers\ServiceFeeApiController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'api'],function($routes){
    Route::post('/register',[AuthApiController::class,'register']);
    Route::post('/login',[AuthApiController::class,'login']);
    Route::post('/profile',[AuthApiController::class,'profile']);
    Route::post('/refresh',[AuthApiController::class,'refresh']);
    Route::post('/logout',[AuthApiController::class,'signout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix("admin")->group(function () {
    Route::apiResource("service", ServiceApiController::class);
    Route::apiResource("servicefee", ServiceFeeApiController::class);
    Route::apiResource("appointment", AppointmentApiController::class);
});

