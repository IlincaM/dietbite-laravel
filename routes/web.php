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
Route::get('/test', 'TestController@index');

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::post('/calculate', 'BmrController@storeBmrCalculation');
Route::post('/charts', 'ChartsController@store');
