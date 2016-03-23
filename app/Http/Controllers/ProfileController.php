<?php

namespace App\Http\Controllers;

use Request;
use Auth;

use App\Profile as Profile;

class ProfileController extends Controller
{
    public function view($id)
    {
        $profile = Profile::find($id);
        return view('profile.profile')->with('profile', $profile);
    }

    public function view_self() {
      $profile = Auth::user()->profile;
      return view('profile.profile')->with('profile', $profile);
    }

    public function edit()
    {
        return view('profile.editProfile');
    }

    public function create()
    {
      return view('profile.createProfile');
    }

    public function update()
    {
        //Get current logged in user
        $profile = Auth::user()->profile;

        $input = Request::all();

        //Save user's profile
        $profile->update($input);

        $profile->save();

        //Redirect to view their profile
        return redirect('/profile');
    }
}
