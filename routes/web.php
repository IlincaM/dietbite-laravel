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



Auth::routes();

Route::get('/', 'BmrController@index');
Route::get('/test', 'TestController@indexForm');
Route::post('/calculateTest', 'TestController@storeBmrCalculationTest');
Route::get('/testTest', 'TestController@testTest');
Route::get('/testTest2', 'TestController@testTest2');

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::post('/calculate', 'BmrController@storeBmrCalculation');
Route::post('/get-meals', 'ChartsController@store');
Route::get('/get-meals', 'ChartsController@listData');
Route::get('/chart', 'ChartsController@showChart');
