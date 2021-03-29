<?php

use App\CourseTypes;
use Illuminate\Database\Seeder;

class CourseTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c_type = new CourseTypes();
        $c_type->name = 'BE';
        $c_type->save();
    }
}
