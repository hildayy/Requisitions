<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
Route::auth();

Route::group(['middleware' => 'auth'], function() {


Route::get('/', 'FormController@index');
Route::post('index', 'FormController@store')->name('store');
Route::post('/', 'FormController@index')->name('index');
Route::get('/index2', 'FormController@index2')->name('index2');
Route::get('/requisitions/{id}', 'FormController@requisitions')->name('requisitions');

Route::get('/approve/{id}',  'FormController@approveReq')->name('approveReq');
Route::get('/disapprove/{id}',  'FormController@disapproveReq')->name('disapproveReq');

Route::get('/sendEmail',  'FormController@sendEmail')->name('sendEmail');
});
