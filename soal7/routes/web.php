<?php

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

Route::get('/', 'NamaController@index');
Route::post('/tambahdata', 'NamaController@store');
Route::get('/shownama/{id}', 'NamaController@show');
Route::put('/updatenama/{id}', 'NamaController@update');
Route::post('/namadelete', 'NamaController@destroy');
