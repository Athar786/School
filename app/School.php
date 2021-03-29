<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name','email','logo','website'];


    public function school()
    {
        return $this->hasMany('App\Campuses');
    }
}
