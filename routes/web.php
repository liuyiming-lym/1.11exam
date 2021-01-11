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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','UserController@loginshow')->name('loginshow');
Route::get('login','UserController@login')->name('login')->middleware('checkuser');
Route::get('show','UserController@show')->name('show');
Route::any('save','UserController@save')->name('save');
