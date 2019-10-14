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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['throttle:60,1']], function() {

    Route::get('/jobs', 'JobsController@index');
    Route::get('/jobs/{param}', 'JobsController@show');
    Route::post('/jobs/{param}', 'JobsController@update');
    Route::delete('/jobs/{param}', 'JobsController@delete');

    Route::get('/tags', 'TagsController@index');
    Route::get('/tags/{param}', 'TagsController@show');
    Route::post('/tags/{param}', 'TagsController@update');
    Route::delete('/tags/{param}', 'TagsController@delete');

    Route::get('/blog', 'BlogsController@index');
    Route::get('/blogs/{param}', 'BlogsController@show');
    Route::post('/blogs/{param}', 'BlogsController@update');
    Route::delete('/blogs/{param}', 'BlogsController@delete');
} );