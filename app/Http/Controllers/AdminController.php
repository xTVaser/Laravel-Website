<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Profile as Profile;
use DB;

class AdminController extends Controller
{
        protected function createFromAdmin(Request $request) {

            //     $this->validate($request, [
            //             'email' => 'required|unique:users|max:255',
            //             'flag' => 'required',
            //     ]);

            //Make a random password
                $password = 'test123';//md5(time());

                //Send off email with password and such

                $id = DB::table('users')->insertGetId([
                    'email' => $request['email'],
                    'password' => bcrypt($password),
                    'flag' => $request['flag'],
                ]);

                //Create new profile and associate it with the user
                $profile = new Profile;
                $profile->user_id = $id;
                $profile->first_name = "Free";
                $profile->middle_name = "";
                $profile->last_name = "Loader";
                $profile->gender = "Other";
                $profile->job_title = "Freeloader";
                $profile->department = "Freeloading";
                $profile->company = "Freeloaders Inc.";
                $profile->birthdate = "1970-01-01";
                $profile->contact_email = "freeloader@freeloaders.com";
                $profile->linkedin_link = "freeloader1";

                $profile->save();
        }
}
