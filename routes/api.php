<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token, x_csrftoken, x-requested-with');

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('films', 'FilmController@getFilms');
Route::get('films/{slug}',   'FilmController@filmBySlug');
Route::post('films/create', 'FilmController@store');
Route::resource('post', 'PostController');
Route::resource('measures','MeasureController');
Route::resource('orders', 'OrderController');
Route::resource('orderDetails', 'OrderDetailsController');

	



