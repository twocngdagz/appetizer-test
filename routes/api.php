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

Route::group(['namespace' => 'Api'], function () {

    Route::resource('passers', 'PasserController', [
        'except' => [
            'update', 'edit', 'show', 'destroy', 'create'
        ]
    ]);

    Route::get('passers/summary', 'PasserSummaryController@index');
});
