<?php
/**
 * File name: web.php
 * Last modified: 2020.06.11 at 15:08:31
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 */

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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('storage/app/public/{id}/{conversion}/{filename?}', 'UploadController@storage');


Route::prefix('customers')->middleware(['auth'])->namespace('Customers')->as('customers.')->group(function () {
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'DashboardController@index')->name('home');

    Route::get('/faqs', 'FaqsController@index')->name('faqs');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/analytics', 'AnalyticsController@index')->name('analytics');
    Route::get('/projects', 'ProjectsController@index')->name('projects');
    Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');    
    Route::get('/subscriptions/plans', 'SubscriptionsController@plans')->name('subscriptions.plans');
    Route::get('/subscriptions/history', 'SubscriptionsController@history')->name('subscriptions.history');
    Route::get('/subscriptions/details', 'SubscriptionsController@details')->name('subscriptions.details');
    Route::get('/projects/history', 'ProjectsController@history')->name('projects.history');
    Route::get('/uploads/reports', 'UploadController@reports')->name('uploads.reports');

    Route::post('/uploads/clear/{token}', 'UploadController@clear')->name('uploads.clear');
    Route::post('/uploads/all/{token}', 'UploadController@uploads')->name('uploads.all');
    Route::post('/uploads/shares/{token}', 'UploadController@shares')->name('shares.all');
    Route::post('/uploads/store/{token}', 'UploadController@store')->name('medias.create');

    Route::get('/uploads/download/{token}', 'UploadController@download')->name('uploads.download');
    Route::get('/uploads/video/{token}', 'UploadController@video')->name('uploads.video');
    Route::get('/uploads/image/{token}', 'UploadController@image')->name('uploads.image');

    Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
    Route::get('/projects/files/{token}', 'ProjectsController@files')->name('projects.files');
    Route::get('/projects/team/{token}', 'TeamsController@teams')->name('projects.teams');
    Route::get('/uploads/share/{token}', 'UploadsController@share')->name('uploads.share');

    Route::get('/orders/repayments', 'OrdersController@repayments')->name('orders.repayments');
    Route::get('/orders/tracings/{token}', 'OrdersController@tracings')->name('orders.tracings');
    Route::get('/orders/repayments', 'OrdersController@repayments')->name('orders.repayments');
    Route::get('/orders/tracings/{token}', 'OrdersController@tracings')->name('orders.tracings');
    Route::post('/orders/processing', 'OrdersController@processing')->name('orders.processing');

    Route::get('/faqs/view/{token}', 'FaqsController@view')->name('faqs.view');
    Route::get('/projects/view/{token}', 'ProjectsController@view')->name('projects.view');

    Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
    Route::post('/subscriptions/store', 'SubscriptionsController@store')->name('subscriptions.store');


    Route::post('/projects/teams/store', 'TeamsController@store')->name('teams.store');
    Route::post('/projects/teams/update', 'TeamsController@update')->name('teams.update');


    Route::post('/projects/update', 'ProjectsController@update')->name('projects.update');
    Route::post('/coupons/update/{token}', 'CouponsController@update')->name('coupons.update');
    Route::post('/orders/update/{token}', 'OrdersController@update')->name('orders.update');
    
    Route::get('/projects/edit/{token}', 'ProjectsController@edit')->name('projects.edit');
    Route::get('/coupons/edit/{token}', 'CouponsController@edit')->name('coupons.edit');
    Route::get('/orders/edit/{token}', 'OrdersController@edit')->name('orders.edit');

    Route::get('/projects/destroy/{token}', 'ProjectsController@destroy')->name('projects.destroy');
    Route::get('/orders/destroy/{token}', 'OrdersController@destroy')->name('orders.destroy');

    Route::get('/uploads/modal/details/{token}', 'UploadController@modalDetails')->name('modal.details');
    Route::get('/uploads/modal/share/{token}', 'UploadController@modalShare')->name('modal.share');
    Route::post('/uploads/modal/share/store', 'UploadController@storeShare')->name('share.store');


    Route::get('/projects/teams/create/{token}', 'TeamsController@create')->name('teams.create');
    Route::get('/projects/teams/edit/{token}', 'TeamsController@edit')->name('teams.edit');
    Route::get('/projects/teams/destroy/{token}/{project}', 'TeamsController@destroy')->name('teams.destroy');

    
    Route::get('/projects/teams/edit/{token}', 'TeamsController@edit')->name('teams.edit');
    Route::get('/projects/teams/destroy/{token}/{project}', 'TeamsController@destroy')->name('teams.destroy');


});
