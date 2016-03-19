<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

        //Fields that can be filled automatically
        protected $fillable = [
          'first_name', 'middle_name', 'last_name', 'contact_email', 'linkedin_link', 'description', 'job_title', 'company', 'department', 'birthdate', 'gender', 'created_at', 'updated_at'
        ];

  //Gets the user associated with this profile
  public function getUser() {
    return $this->belongsTo('User');
  }
}
