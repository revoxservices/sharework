<?php

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

Route::prefix('customer')->group(function () {
    Route::post('login', 'API\UserAPIController@login');
    Route::post('register', 'API\UserAPIController@register');
    Route::post('send_reset_link_email', 'API\UserAPIController@sendResetLinkEmail');
    Route::get('logout', 'API\UserAPIController@logout');
    Route::get('settings', 'API\UserAPIController@settings');
    Route::resource('faqs', 'API\FaqAPIController');
});

Route::middleware('auth:api')->group(function () {
    Route::post('users/{id}', 'API\UserAPIController@update');
    Route::get('projects', 'API\ProjectAPIController@index');
    Route::get('project/{id}', 'API\ProjectAPIController@show');
    Route::get('upload/{id}', 'API\UploadAPIController@show');
    Route::get('project/uploads/{id}', 'API\UploadAPIController@uploads');
    Route::resource('faqs', 'API\FaqAPIController');

});