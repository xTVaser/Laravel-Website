<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Application;
use App\User;

class Comment extends Model
{
    //Get application associated with this Comment
    public function getApplication() {
      return this->belongsTo('App\Application');
    }

    //Gets the user that posted the comment
    public function getUser() {
      return this->belongsTo('App\User');
    }
}
