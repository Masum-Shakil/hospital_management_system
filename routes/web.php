<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('home/',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/add_doctors_view',[AdminController::class,'add_doctors_view']);
Route::post('/upload_doctor',[AdminController::class,'upload_doctor']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);
Route::get('/appointment_view',[AdminController::class,'appointment_view']);
Route::get('/appointment_approve/{id}',[AdminController::class,'appointment_approve']);
Route::get('/appointment_cancel/{id}',[AdminController::class,'appointment_cancel']);
Route::get('/all_doctors/',[AdminController::class,'all_doctors']);
Route::get('/doctor_delete/{id}',[AdminController::class,'doctor_delete']);
Route::get('/doctor_update/{id}',[AdminController::class,'doctor_update']);
Route::post('/update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::get('/email_view/{id}',[AdminController::class,'email_view']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);
