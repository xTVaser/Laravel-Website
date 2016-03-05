<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application;

class Job extends Model
{
    //Gets the applications associated with this job
    public function getApplications() {
        return $this->hasMany('App\Application');
    }
}
