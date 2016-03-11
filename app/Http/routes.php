<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Profile
Route::get('/profile',          'ProfileController@view');
Route::get('/editprofile',      'ProfileController@edit');

//Jobs
Route::get('/jobs',             'JobController@index');
Route::get('/jobs/create',      'JobController@create');

Route::post('/jobs/create',     'JobController@store');

//Applications
Route::get('/applicants',       'ApplicationController@view');

//Account
Route::get('/createaccount', function () {
    return view('admin.createAccount');
});


//Temporary Route
Route::get('/mail-config',  function() {
    return config('mail');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@index'));
});
