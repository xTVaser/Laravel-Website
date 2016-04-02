<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Application extends Model
{
  protected $fillable = [
    'job_id', 'created_at', 'updated_at',
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

  public static function sqlComments($id) {

          return $comments = DB::table('comments')
                                ->join('profiles', 'comments.author_id', '=', 'profiles.user_id')
                                ->select(   'comments.id as id',
                                            'comments.application_id as application_id',
                                            'comments.author_id as author_id',
                                            'comments.body as body',
                                            'comments.created_at',
                                            'comments.updated_at',
                                            'profiles.first_name as author_name')
                                ->where('application_id', '=', $id)
                                ->distinct()
                                ->get();
  }

  public static function joinJobsAndApplicationsAndProfiles() {

          return $apps = DB::table('applications')
                            ->join('jobs', 'applications.job_id', '=', 'jobs.id')
                            ->join('profiles', 'applications.user_id', '=', 'profiles.user_id')
                            ->select(   'applications.id as app_id',
                                        'status',
                                        'applications.created_at as app_created_at',
                                        'applications.updated_at as app_updated_at',
                                        'job_id',
                                        'applications.user_id',
                                        'title',
                                        'jobs.description',
                                        'qualifications',
                                        'salary',
                                        'start_date',
                                        'closing_date',
                                        'job_type',
                                        'jobs.created_at as job_created_at',
                                        'first_name',
                                        'middle_name',
                                        'last_name',
                                        'contact_email')
                            ->distinct()
                            ->get();
  }

  public static function joinJobsAndApplications() {

          return $apps = DB::table('applications')
                            ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                            ->select(   'applications.id as app_id',
                                        'status',
                                        'applications.created_at as app_created_at',
                                        'applications.updated_at as app_updated_at',
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
                            ->distinct()
                            ->get();
  }
  public static function joinJobsAndApplicationsOnID($id) {

          return $apps = DB::table('applications')
                            ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                            ->select(   'applications.id as app_id',
                                        'status',
                                        'applications.created_at as app_created_at',
                                        'applications.updated_at as app_updated_at',
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
                            ->where('applications.id', '=', $id)
                            ->first();
  }

  public static function joinJobsAndApplicationsOnUserID($id) {

          return $apps = DB::table('applications')
                            ->leftJoin('jobs', 'job_id', '=', 'jobs.id')
                            ->select(   'applications.id as app_id',
                                        'status',
                                        'applications.created_at as app_created_at',
                                        'applications.updated_at as app_updated_at',
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
                            ->distinct()
                            ->where('user_id', '=', $id)
                            ->get();
  }
}
