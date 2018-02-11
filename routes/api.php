<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Auth'], function () {
    Route::post('login', 'PassportController@login');
    Route::post('register', 'PassportController@register');
});
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('get-details', 'Auth\PassportController@getDetails');
    Route::group(['namespace' => 'Clients'], function () {
       Route::post('index', 'ClientsController@index');
       Route::post('get', 'ClientController@get');
       Route::
    });
});