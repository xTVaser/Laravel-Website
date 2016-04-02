<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Fields that can be filled automatically
    protected $fillable = [
        'body',
    ];

    //Get application associated with this Comment
    public function getApplication()
    {
        return $this->hasOne('App\Application');
    }

    //Gets the user that posted the comment
    public function getUser()
    {
        return $this->hasOne('App\User');
    }
}
