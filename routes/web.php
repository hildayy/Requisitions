<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[App\http\Controllers\FormController::class,'index']);
Route::post('index',[App\http\Controllers\FormController::class,'store'])->name('store');
Route::post('/',[App\http\Controllers\FormController::class,'index'])->name('index');
Route::get('/index2',[App\http\Controllers\FormController::class,'index2'])->name('index2');
Route::get('/requisitions/{id}',[App\http\Controllers\FormController::class,'requisitions'])->name('requisitions');
