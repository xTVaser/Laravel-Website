<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

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

  public static function joinJobsAndApplications() {

          return $apps = DB::table('applications')
                    ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                    ->select('*')
                    ->get();
  }
  public static function joinJobsAndApplicationsOnID($id) {

          return $apps = DB::table('applications')
                    ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                    ->select('*')
                    ->where('applications.id', '=', $id)
                    ->first();
  }
}
