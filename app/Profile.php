<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profile extends Model
{

        //Fields that can be filled automatically
        protected $fillable = [
          'first_name', 'middle_name', 'last_name', 'contact_email', 'linkedin_link', 'description', 'job_title', 'company', 'department', 'birthdate', 'gender', 'created_at', 'updated_at'
        ];

        public static function findProfile($id) {

                return $profile = DB::table('profiles')
                          ->select('*')
                          ->where('user_id', '=', $id)
                          ->first();
        }
}
