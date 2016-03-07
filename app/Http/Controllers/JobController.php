<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;

class JobController extends Controller
{
    //
    public function index() {

      //Get all jobs from the database
      $jobs = Job::all();

      //Return this data to the jobs view
      return view('jobs.index')->with('jobs', $jobs);
    }
}
