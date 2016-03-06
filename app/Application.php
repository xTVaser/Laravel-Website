<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //Gets the job associated with this Application
    public function getJob() {
      return $this->belongsTo('Job');
    }

    //Gets the user that the application belongs to
    public function getUser() {
      return $this->belongsTo('User');
    }

    //Gets comments associated with the application
    public function getComments() {
      return $this->hasMany('Comment');
    }
}
