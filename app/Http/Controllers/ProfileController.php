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
      return view('profile.profile')->with('profile', $user->profile());
    }

    public function edit()
    {
        return view('profile.editProfile');
    }

    public function update()
    {
        //Get profile data
        $input = Request::all();

        //Create new profile from data
        $profile = Profile::create($input);

        //Get current logged in user
        $user = Auth::user();

        //Associate the new profile with their account
        $user->profile()->associate($profile);

        //Redirect to view their profile
        return redirect('/profile');
    }
}
