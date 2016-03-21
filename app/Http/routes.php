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

//Temporary Route
Route::get('/mail-config',  function () {
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

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@index'));
});

Route::group(['middleware' => ['web', 'auth']], function () {

        //EVERYONES routes------------------------

        //Jobs GET requests
        Route::get('/jobs',             'JobController@index');

        //Profile GET requests
        Route::get('/profile/{id}',     'ProfileController@view');
        Route::get('/profile',          'ProfileController@view_self');
        Route::get('/editprofile',      'ProfileController@edit');

        //Profile POST requests
        Route::post('/editprofile',     'ProfileController@update');

        //My Applications Page
        Route::get('/my-applications', function () { return view('applications.my-applications'); });

        //----------------------------------------

        //Applicant Pages
        Route::group(['middleware' => 'applicant'], function () {

        });

        //All Elevated Users
        Route::group(['middleware' => 'elevated'], function () {

                //Applications
                Route::get('/applicants',       'ApplicationController@view');
        });

        //HIRING MEMBER and HIRING CHAIR Pages
        Route::group(['middleware' => 'committee'], function () {

                //Create Account
                Route::get('/createaccount', function () { return view('admin.createAccount'); });

                //Jobs GET requests
                Route::get('/jobs/create',      'JobController@create');
                //Jobs POST requests
                Route::post('/jobs/create',     'JobController@store');

        });

        //FACULTY Only Pages//
        Route::group(['middleware' => 'faculty'], function () {

                //Can view others peoples profiles!

        });

        //HIRING MEMBER Only Pages//
        Route::group(['middleware' => 'member'], function () {

                //Can view others peoples profiles!

        });

        //HIRING CHAIR Only Pages//
        Route::group(['middleware' => 'chair'], function () {

                //Can view others peoples profiles!

        });
});
