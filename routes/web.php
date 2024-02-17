<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [HomeController::class,"index"]);
Route::get("/view",[HomeController::class,"viewService"]);
 

Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard');

        //service routes
        Route::prefix("service")->group(function () {
            Route::controller(ServiceController::class)->group(function () {
                Route::get('/', 'index')->name("admin.service.manage");
                Route::get('/insert', 'insert')->name("admin.service.insert");
                Route::get('/view/{id}', 'view')->name("admin.service.view");
                Route::post('/store', 'store')->name("admin.service.store");
            });
        });
    });
});