<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\Application as Application;
use App\Job as Job;

class ApplicationController extends Controller
{
    public function view($id)
    {
        $application = Application::joinJobsAndApplicationsOnID($id);

        return view('applications.application')->with('application', $application);
    }

    public function viewOwn()
    {
        $applications = Auth::user()->getApplications();

        return view('applications.my-applications')->with('applications', $applications);
    }

    public function viewAll()
    {
        $appInfo = Application::joinJobsAndApplications();

                //Return this data to the jobs view
                return view('applications.index')->with(compact('appInfo', $appInfo));
    }

    public function create($id)
    {
        $job = Job::find($id);
        $profile = Auth::User()->profile;

        return view('applications.apply')->with('job', $job)->with('profile', $profile);
    }

    public function store()
    {
        $input = Request::all();

        $application = Application::create($input);
        $application->user_id = Auth::user()->id;

        $application->save();

        return redirect('/my-applications');
    }

    public function approveOrDeny($id) {

            $user_flag = Auth::user()->flag;

            if(Request::get('approve') && $user_flag == 3)
                $this->approveApplicant($id);
                else if(Request::get('deny') && $user_flag == 3)
                        $this->denyApplicant($id);
                else {
                        $this->commentHandler();
                }

                return $this->view($id);
    }

    private function approveApplicant($id) {

            $app = Application::find($id);

            $app->status = "Accepted";

            $app->save();


    }

    private function denyApplicant($id) {

            $app = Application::find($id);

            $app->status = "Rejected";

            $app->save();

            return redirect('/applications/'+$id);
    }
}
