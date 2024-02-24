<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFeesController;
use Illuminate\Support\Facades\Route;

// Route::match(['get','post'],'/login',[AuthController::class,"login"])->name("login");
// Route::post('/register',[AuthController::class,"registerNew"])->name("register");
// Route::post('/logout',[AuthController::class,"logout"])->name("logout");


Route::get("/login", [AuthController::class,"signIn"])->name('login');
Route::get("/logout", [AuthController::class,"signOut"])->name('logout');
Route::get("/register", [AuthController::class,"register"])->name('register');
Route::get("/profile", [AuthController::class,"profile"])->name('profile');

Route::get("/", [HomeController::class,"index"])->name("index");
Route::get("/myBooking", [HomeController::class,"myBooking"])->name("myBooking");
Route::get("/view/{slug}",[HomeController::class,"viewService"])->name("home.view");
Route::get("/aboutPage", [HomeController::class,"aboutPage"])->name("aboutPage");
Route::get("/confirmed_appointment", [HomeController::class,"confirmed_appointment"])->name('confirmed_appointment');

    Route::get("/profile", [AuthController::class,"profile"])->name('profile');    


Route::prefix("admin")->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard')->name("admin.dashboard");

        //service routes
        Route::prefix("service")->group(function () {
            Route::controller(ServiceController::class)->group(function () {
                Route::get('/', 'index')->name("admin.service.manage");
                Route::get('/insert', 'insert')->name("admin.service.insert");
                Route::get('/view/{id}', 'view')->name("admin.service.view");
                Route::post('/store', 'store')->name("admin.service.store");
            });
        });
        Route::prefix("service-fee")->group(function () {
            Route::controller(ServiceFeesController::class)->group(function () {
                Route::get('/', 'index')->name("admin.servicefee.manage");
                Route::get('/insert', 'insert')->name("admin.servicefee.insert");
                Route::get('/view/{id}', 'view')->name("admin.servicefee.view");
                Route::post('/store', 'store')->name("admin.servicefee.store");
            });
        });
        Route::prefix("appointment")->group(function () {
            Route::controller(AppointmentController::class)->group(function () {
                Route::get('/', 'index')->name("admin.appointment.manage");
                Route::get('/view/{id}', 'show')->name("admin.appointment.view");
               });
        });
    });
});

Route::get("/{slug}/appointment",[HomeController::class,"bookAppointment"])->name("home.bookAppointment");
