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

/** 
 * Client Routes
 */
    Route::get('/clients/list', 'ClientsController@index');
    Route::get('/clients/create', 'ClientsController@create');
    Route::post('/clients', 'ClientsController@store');
    Route::get('/clients/{name}', 'ClientsController@show');
    Route::get('/clients/{name}/edit', 'ClientsController@edit');
    Route::patch('/clients/{client}', 'ClientsController@update');
    Route::delete('/clients/{client}', 'ClientsController@destroy');
/**
 * Media Plan Routes
 */
    Route::get('/{client}/media_plan/create', 'MediaPlansController@create');
    Route::get('/media_plan/{mediaPlan}/edit', 'MediaPlansController@edit');
    Route::post('/{client}/media_plan', 'MediaPlansController@store');
    Route::get('/media_plan/{mediaPlan}', 'MediaPlansController@show');
    Route::patch('/media_plan/{mediaPlan}', 'MediaPlansController@update');
    Route::delete('/media_plan/{mediaPlan}', 'MediaPlansController@destroy');

    /**
     * Proposal Requests
     */

    Route::get('proposal_requests/{proposalRequest}/edit', 'ProposalRequestsController@edit');
    Route::get('/{mediaPlan}/proposal_requests/{proposalRequest}', 'ProposalRequestsController@show');
    Route::patch('proposal_requests/{proposalRequest}', 'ProposalRequestsController@update');
    Route::delete('proposal_requests/{proposalRequest}', 'ProposalRequestsController@destroy');
    Route::get('{title}/rfp/create', 'ProposalRequestsController@create');
    Route::post('proposal_requests', 'ProposalRequestsController@store');
    Route::post('/{mediaPlan}/proposal_requests/{proposalRequest}/proposals', 'ProposalRequestsController@addFile');






    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
