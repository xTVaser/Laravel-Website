<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Profile as Profile;
use App\Job;

class JobController extends Controller
{
  public function index()
  {

    //Get all jobs from the database
    $jobs = Job::all();

    //Return this data to the jobs view
    return view('jobs.index')->with('jobs', $jobs);
  }

  public function view(Request $request, $id)
  {
    $job = Job::find($id);

    $applications = Job::allApplicationsOnJob($id);

    return view('jobs.description')->with('job', $job)->with('applications', $applications);
  }

  //Called when the user wants to create a job
  public function create()
  {
    return view('jobs.create');
  }

  //Called when the user submits the create job form. This method saves the data into the db
  public function store(Request $request)
  {
    //Validate incoming parameters before
    $this->validate($request, [
      'title' => 'required|max:255',
      'description' => 'required|max:255',
      'qualifications' => 'required',
      'salary' => 'required',
      'start_date' => 'required',
      'closing_date' => 'required',
      'job_type' => 'required|max:255',
    ]);

    //Creates a new job using all form input (fields set in Model as fillable (mass assignment))
    $input = Request::all();

    Job::create($input);

    return redirect('jobs');
  }

  public function edit(Request $request, $id)
  {
    $this->validate($request, [
      'title' => 'required|max:255',
      'description' => 'required|max:255',
      'qualifications' => 'required',
      'salary' => 'required',
      'start_date' => 'required',
      'closing_date' => 'required',
      'job_type' => 'required|max:255',
    ]);

    $job = Job::find($id);

    return view('jobs.edit')->with('job', $job);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'title' => 'required|max:255',
      'description' => 'required|max:255',
      'qualifications' => 'required',
      'salary' => 'required',
      'start_date' => 'required',
      'closing_date' => 'required',
      'job_type' => 'required|max:255',
    ]);
    
    $job = Job::find($id);

    $input = Request::all();

    $job->update($input);
    $job->save();


    $applications = Job::allApplicationsOnJob($id);

    foreach($applications as $application) {

      $profile = Profile::findProfile($application->user_id);
      //Email Applicant and tell him he got the job.
      Mail::send('emails.goofed', ['profile' => $profile], function ($message) use ($profile) {
        $message->from('chair@algomau.ca', 'Hiring Chair');
        $message->to($profile->contact_email);
        $message->subject('Job Description has Changed');
      });
    }




    //Redirect to view their profile
    return redirect()->action('JobController@view', [$id]);

  }
}
