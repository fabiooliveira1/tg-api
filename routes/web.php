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
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function ($route) {
    Route::group(['namespace' => 'Bill', 'prefix' => 'bill'], function ($route) {
        $route->get('/', 'BillsController@index');
        $route->get('/{bill}', 'BillsController@show');
        $route->post('/', 'BillsController@create');
        $route->put('/{bill}', 'BillsController@update');
        $route->delete('/{bill}', 'BillsController@delete');
    });
});
