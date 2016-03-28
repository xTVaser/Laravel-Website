<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
  //Fields that can be filled automatically
  protected $fillable = [
    'title', 'description', 'qualifications', 'salary', 'start_date', 'closing_date', 'job_type',
  ];

  //Gets the applications associated with this job
  public function getApplications() {
    return $this->hasMany('App\Application');
  }

  public static function allApplicationsOnJob($id) {

          return $applications = DB::table('applications')
                    ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                    ->select(   'applications.id as app_id',
                                'status',
                                'applications.created_at as app_created_at',
                                'job_id',
                                'user_id',
                                'title',
                                'description',
                                'qualifications',
                                'salary',
                                'start_date',
                                'closing_date',
                                'job_type',
                                'jobs.created_at as job_created_at')
                    ->where('applications.job_id', '=', $id)
                    ->get();
  }
}
