<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile as Profile;
use DB;
use Mail;

//Handles all Admin specific tasks, such as making new user accounts.
class AdminController extends Controller
{
  protected function viewCreateAccount()
  {
    return view('admin.createAccount');
  }

  //Will construct a new account.
  protected function createFromAdmin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|unique:users',
      'flag' => 'required',
    ]);

    //Make a random password
    $password = md5(time());

    //Send off email with password and such
    Mail::send('emails.newaccount', ['password' => $password], function ($message) use ($request) {
      $message->from('chair@algomau.ca', 'Hiring Chair');
      $message->to($request['email']);
      $message->subject('Faculty or Member Account Creation');
    });

    //Add a new user to the database.
    $id = DB::table('users')->insertGetId([
      'email' => $request['email'],
      'password' => bcrypt($password),
      'flag' => $request['flag'],
    ]);

    //Create new profile and associate it with the user
    $profile = new Profile();
    $profile->user_id = $id;
    $profile->first_name = 'Free';
    $profile->middle_name = '';
    $profile->last_name = 'Loader';
    $profile->gender = 'Other';
    $profile->job_title = 'Freeloader';
    $profile->department = 'Freeloading';
    $profile->company = 'Freeloaders Inc.';
    $profile->birthdate = '1970-01-01';
    $profile->contact_email = 'freeloader@freeloaders.com';
    $profile->linkedin_link = 'freeloader1';

    //Save the profile object into the database.
    $profile->save();

    //After creating the account, we redirect to the homepage.
    return view('home');
  }
}
