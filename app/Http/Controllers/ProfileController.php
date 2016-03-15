<?php

namespace App\Http\Controllers;

use Request;
use App\Profile;

class ProfileController extends Controller
{
    public function view()
    {
        return view('profile.profile');
    }

    public function edit()
    {
        return view('profile.editProfile');
    }

    public function store()
    {
        $input = Request::all();
        Profile::create($input);

        return redirect('profile.profile');


    }
}
