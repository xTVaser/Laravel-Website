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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/editprofile', function () {
    return view('profile.editProfile');
});
Route::get('/profile', function () {
    return view('profile.profile');
});
Route::get('/jobs', function () {
    return view('jobs.jobOffers');
});
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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
