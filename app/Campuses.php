<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campuses extends Model
{
    protected $table = 'campuses';
    protected $fillable = ['name','email','phone','school_id','address'];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
