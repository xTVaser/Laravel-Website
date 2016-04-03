<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Returns the profile of the user
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    //Returns applications that the user has submitted
    public function getApplications()
    {
        return $this->hasMany('App\Application');
    }
}
