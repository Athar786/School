<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTypes extends Model
{
    protected $table = 'course_types';
    protected $fillable = ['name'];
}
