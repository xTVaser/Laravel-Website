<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

        //Fields that can be filled automatically
        protected $fillable = [
          'firstName', 'middleName', 'lastName', 'contactEmail', 'linkedin', 'description', 'jobTitle', 'company', 'department', 'birthdate', 'gender',
        ];

  //Gets the user associated with this profile
  public function getUser() {
    return $this->belongsTo('User');
  }
}
