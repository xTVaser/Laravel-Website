<?php

namespace App\Http\Controllers;

use Request;
use App\Application;

class ApplicationController extends Controller {

        public function view(Request $request, $id)
        {
            $application = Application::find($id);
            return view('applications.application')->with('application', $application);
        }

        public function viewOwn() {

                return view('applications.my-applications');
        }

        public function viewAll() {

                //Get all jobs from the database
                $applications = Application::all();

                //Return this data to the jobs view
                return view('applications.index')->with('applications', $applications);
        }
}
