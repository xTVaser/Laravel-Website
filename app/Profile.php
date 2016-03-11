<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  //Gets the user associated with this profile
  public function getUser() {
    return $this->belongsTo('User');
  }
}
