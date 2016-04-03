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
//-------------------------------------------------------------------------
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

//Routes that are accessible if you are not authenticated
Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@index'));
    Route::get('/home', array('before' => 'auth', 'uses' => 'HomeController@index'));

});

//Routes that are accessible if you are authenicated
Route::group(['middleware' => ['web', 'auth']], function () {

    //EVERYONES Routes------------------------

        //Jobs GET requests
        Route::get('/jobs',                     'JobController@index');
        Route::get('/jobs/description/{id}',    'JobController@view');

        //Profile GET requests
        Route::get('/profile',                  'ProfileController@view_self');
        Route::get('/editprofile',              'ProfileController@edit');

        //Profile POST requests
        Route::post('/editprofile',             'ProfileController@update');

    //----------------------------------------

    //Applicant Only Routes ------------------

        Route::group(['middleware' => 'applicant'], function () {

                //My Applications Page
                Route::get('/my-applications',          'ApplicationController@viewOwn');
                Route::get('/apply/{id}',               'ApplicationController@create');
                Route::post('/apply/{id}',              'ApplicationController@store');
        });

    //----------------------------------------

    //All Elevated Users Routes --------------

        Route::group(['middleware' => 'elevated'], function () {

                Route::get('/profile/{id}',             'ProfileController@view');

                //Applications
                Route::get('/applications/{id}',        'ApplicationController@view');
                Route::get('/applications/',            'ApplicationController@viewAll');
        });

    //----------------------------------------

    //HIRING MEMBER and HIRING CHAIR Routes --

        Route::group(['middleware' => 'committee'], function () {

                //Create Account GET
                Route::get('/createaccount',    'AdminController@viewCreateAccount');
                //Create Account POST
                Route::post('/createaccount',   'AdminController@createFromAdmin');

                //Jobs GET requests
                Route::get('/jobs/create',      'JobController@create');
                Route::get('/jobs/edit/{id}',   'JobController@edit');
                //Jobs POST requests
                Route::post('/jobs/create',     'JobController@store');
                Route::post('jobs/edit/{id}',   'JobController@update');

                Route::post('/applications/{id}', 'ApplicationController@approveOrDeny');

        });

    //----------------------------------------

    //FACULTY Only Routes --------------------

        Route::group(['middleware' => 'faculty'], function () {

                //Empty
        });

    //----------------------------------------

    //HIRING MEMBER Only Routes --------------

        Route::group(['middleware' => 'member'], function () {

                //Empty
        });

    //----------------------------------------

    //HIRING CHAIR Only Routes ---------------

        Route::group(['middleware' => 'chair'], function () {

                //Empty
        });

    //----------------------------------------
});
