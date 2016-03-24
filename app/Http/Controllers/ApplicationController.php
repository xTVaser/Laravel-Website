<?php

namespace App\Http\Controllers;

use Request;
use Auth;

use App\Application as Application;

class ApplicationController extends Controller {

        public function view(Request $request, $id)
        {
            $application = Application::find($id);
            return view('applications.application')->with('application', $application);
        }

        public function viewOwn() {

                $applications = Auth::user()->getApplications();
                return view('applications.my-applications')->with('applications', $applications);
        }

        public function viewAll() {

                //Get all jobs from the database
                $applications = Application::all();

                //Return this data to the jobs view
                return view('applications.index')->with('applications', $applications);
        }

        public function create($id) {
          $job = Job::find($id);
          return view('applications.create')->with('job', $job);
        }

        public function store() {
          $input = Request::all();

          $application = Application::create($input);
          $application->user_id = Auth::user()->id;

          return redirect('/my-applications');
        }
}
