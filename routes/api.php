<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/popular-drinks', 'DrinkController@popularIndex')->name('popular.drinks.index');
Route::get('/machines', 'MachineController@index')->name('machines.index');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/users/self', 'UserController@self')->name('users.self');

    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');

    Route::get('/machines/{machine}/drinks', 'MachineController@drinks')->name('machines.drinks.index');
    Route::get('/machines/{machine}/orders{status?}', 'MachineController@orders')->name('machines.orders.index');

    Route::post('/orders/{order}/{drink}', 'OrderController@updateDrinkStatus')->name('orders.drinks.update');
});
