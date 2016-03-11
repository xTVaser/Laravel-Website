<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Get application associated with this Comment
    public function getApplication() {
      return this->belongsTo('Application');
    }

    //Gets the user that posted the comment
    public function getUser() {
      return this->belongsTo('User');
    }
}
