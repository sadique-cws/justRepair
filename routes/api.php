<?php

use App\Http\Controllers\AppointmentApiController;
use App\Http\Controllers\ServiceApiController;
use App\Http\Controllers\ServiceFeeApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerApiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("appointment/my-booking", [HomeController::class,"myBookingApi"])->middleware('jwt.auth')->name("appointment.mybooking");
Route::post('appointment/updateStatus', [AppointmentApiController::class, 'updateStatus'])->name('appointment.updateStatus');

Route::prefix("admin")->group(function () {

    Route::prefix("user")->group(function(){
        Route::controller(UserApiController::class)->group(function(){
            Route::get('/','users')->name("admin.api.users");
        });
    });

    Route::apiResource("banner",BannerApiController::class);
    Route::apiResource("service", ServiceApiController::class);
    Route::apiResource("servicefee", ServiceFeeApiController::class);
    Route::apiResource("appointment", AppointmentApiController::class);

});


Route::post('/login', [AuthController::class,"login"]);
Route::post('/register', [AuthController::class,"register"]);
Route::post('/logout', [AuthController::class,"logout"])->middleware('jwt.auth');
Route::post('/refresh-token', [AuthController::class,"refreshToken"]);

Route::get('search-complain/{complain_no}',[AppointmentApiController::class,"searchComplain"]);



Route::get('/profile', function () {
    return auth()->user();
})->middleware('jwt.auth');

Route::get('/invoice/{id}',[InvoiceController::class,"viewInvoice"]);
