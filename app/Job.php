<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //Gets the applications associated with this job
    public function getApplications() {
        return $this->hasMany('Application');
    }
}
