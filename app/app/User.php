<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function danger()
    {
        return $this->hasMany('App\Danger');
    }

    public function request()
    {
        return $this->hasMany('App\Request');
    }
}
