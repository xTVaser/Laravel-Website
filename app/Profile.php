<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
  //Gets the user associated with this profile
  public function getUser() {
    return $this->belongsTo('App\User');
  }
}
