<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  //Fields that can be filled automatically
  protected $fillable = [
    'title', 'description', 'qualifications', 'salary', 'start_date', 'closing_date', 'job_type',
  ];

  //Gets the applications associated with this job
  public function getApplications() {
    return $this->hasMany('Application');
  }
}
