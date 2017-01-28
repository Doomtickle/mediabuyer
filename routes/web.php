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


Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/clients/list', 'ClientsController@index');
    Route::get('/clients/create', 'ClientsController@create');
    Route::post('/clients', 'ClientsController@store');
    Route::get('/clients/{name}', 'ClientsController@show');
    Route::get('/clients/{name}/edit', 'ClientsController@edit');
    Route::patch('/clients/{client}', 'ClientsController@update');
    Route::delete('/clients/{client}', 'ClientsController@destroy');
    
    
    
    
//    Route::resource('clients', 'ClientsController');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
