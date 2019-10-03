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

Route::get('/test', 'TestController@show');

Route::view('/order/{order}/status', 'index')
    ->name('order.status');

Route::view('/{vue?}', 'index')
    ->name('index')
    ->where('vue', '[\/\w\.-]*');