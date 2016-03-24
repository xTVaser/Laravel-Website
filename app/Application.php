<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //Gets the job associated with this Application
    public function getJob() {
      return $this->hasOne('Job');
    }

    //Gets the user that the application belongs to
    public function getUser() {
      return $this->hasOne('User');
    }

    //Gets comments associated with the application
    public function getComments() {
      return $this->hasMany('App\Comment');
    }
}
