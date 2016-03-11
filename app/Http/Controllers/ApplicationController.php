<?php

namespace App\Http\Controllers;

use Request;
use App\Profile;

class ApplicationController extends Controller {

        public function view() {

                return view('applications.applicants');
        }
}
