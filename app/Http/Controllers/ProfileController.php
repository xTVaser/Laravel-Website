<?php

namespace App\Http\Controllers;

use Request;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    public function view(Request $request, $id)
    {
        $profile = Profile::find($id);
        return view('profile.profile')->with('profile', $profile);
    }

    public function view_self() {
      $user = Auth::user();
      return view('profile.profile')->with('profile', $user->profile);
    }

    public function edit()
    {
        return view('profile.editProfile');
    }

    public function update(Request $request)
    {
        //Get current logged in user
        $user = Auth::user();

        //Update values on user's profile
        $user->profile->first_name = $request->input('first_name');
        $user->profile->middle_name = $request->input('middle_name');
        $user->profile->last_name = $request->input('last_name');
        $user->profile->gender = $request->input('gender');
        $user->profile->job_title = $request->input('job_title');
        $user->profile->department = $request->input('department');
        $user->profile->company = $request->input('company');
        $user->profile->description = $request->input('description');
        $user->profile->birthdate = $request->input('birthdate');
        $user->profile->contact_email = $request->input('contact_email');
        $user->profile->linkedin_link = $request->input('linkedin_link');

        //Save user's profile
        $user->profile->save();



        //Redirect to view their profile
        return redirect('/profile');
    }
}
