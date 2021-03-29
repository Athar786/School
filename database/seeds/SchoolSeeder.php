<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = new School();
        $school->name = 'Eternal';
        $school->email = 'atharerit@gmail.com';
        $school->website = 'eternal.com';
        $school->save();
    }
}
