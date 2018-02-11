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
    Route::group(['namespace' => 'User'], function () {
        Route::post('index', 'UserController@index');
        Route::post('get', 'UserController@get');
        Route::post('update', 'UserController@update');
        Route::post('delete', 'UserController@delete');
        Route::post('create', 'UserController@update');
    });

    Route::group(['prefix' => 'clients', 'namespace' => 'Clients'], function () {
       Route::post('', 'ClientsController@index');
       Route::post('get', 'ClientsController@get');
       Route::post('update', 'ClientsController@update');
       Route::post('delete', 'ClientsController@delete');
       Route::post('create', 'ClientsController@create');
       Route::group(['prefix' => 'specs'], function () {
           Route::post('update', 'ClientSpecsController@update');
           Route::post('delete', 'ClientSpecsController@delete');
           Route::post('create', 'ClientSpecsController@create');
       });
    });

    Route::group(['namespace' => 'Assets'], function () {
        Route::post('index', 'AssetsController@index');
        Route::post('get', 'AssetsController@get');
        Route::post('update', 'AssetsController@update');
        Route::post('delete', 'AssetsController@delete');
        Route::post('create', 'AssetsController@update');
        Route::group(['prefix' => 'info'], function () {
            Route::post('update', 'AssetInfoController@update');
            Route::post('delete', 'AssetInfoController@delete');
            Route::post('create', 'AssetInfoController@create');
        });
    });


});