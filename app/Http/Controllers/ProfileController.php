<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile as Profile;

class ProfileController extends Controller
{
    public function view($id)
    {
        $profile = Profile::find($id);

        return view('profile.profile')->with('profile', $profile);
    }

    public function view_self()
    {
        $profile = Auth::user()->profile;

        return view('profile.profile')->with('profile', $profile);
    }

    public function edit()
    {
        $profile = Auth::user()->profile;

        return view('profile.editProfile')->with('profile', $profile);
    }

    public function create()
    {
        return view('profile.createProfile');
    }

    public function update(Request $request)
    {

        //Ensure that the request is valid before updating the database
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'middle_name' => 'max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'job_title' => 'max:255',
            'department' => 'max:255',
            'company' => 'max:255',
            'description' => 'max:5000',
            'birthdate' => 'max:255',
            'contact_email' => 'required|max:255',
            'linkedin_link' => 'max:255',
        ]);

        //Get current logged in user
        $profile = Auth::user()->profile;
        $input = $request->all();

        //Save user's profile
        $profile->update($input);
            $profile->save();

        //Redirect to view their profile?
        return redirect('/profile');
    }
}
