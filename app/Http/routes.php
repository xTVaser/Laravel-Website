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

Route::get('/editprofile', function () {
    return view('profile.editProfile');
});
Route::get('/profile', function () {
    return view('profile.profile');
});

Route::get('/jobs', 'JobController@index');

Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/create', 'JobController@store');

Route::get('/createaccount', function () {
    return view('admin.createAccount');
});
Route::get('/applicants', function () {
    return view('jobs.applicants');
});
Route::get('/editprofile', function () {
    return view('profile.editProfile');
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
