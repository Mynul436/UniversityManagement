<?php

namespace Modules\Student\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Student;

class StudentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Students Seed
         * ------------------
         */

        // DB::table('students')->truncate();
        // echo "Truncate: students \n";

        Student::factory()->count(20)->create();
        $rows = Student::all();
        echo " Insert: students \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
