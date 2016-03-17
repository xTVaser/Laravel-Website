<?php

namespace App\Http\Controllers;

use Request;
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

    //Called when the user wants to create a job
    public function create()
    {
        return view('jobs.create');
    }

    //Called when the user submits the create job form. This method saves the data into the db
    public function store()
    {
        //Creates a new job using all form input (fields set in Model as fillable (mass assignment))
        $input = Request::all();

        Job::create($input);

        return redirect('jobs');
    }
}
