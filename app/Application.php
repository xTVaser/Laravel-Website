<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $fillable = [
    'date_posted', 'job_id', 'created_at', 'updated_at',
  ];

  //Gets the job associated with this Application
  public function getJob() {
    return $this->hasOne('App\Job');
  }

  //Gets the user that the application belongs to
  public function getUser() {
    return $this->hasOne('App\User');
  }

  //Gets comments associated with the application
  public function getComments() {
    return $this->hasMany('App\Comment');
  }

  public function joinJobsAndApplications() {

          return DB::table('jobs')
                        ->leftJoin('jobs', 'jobs.id', '=', 'job_id')
                        ->select('users.*', 'jobs.*')
                        ->get();
  }
}
