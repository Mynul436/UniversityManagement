<?php

namespace Modules\Subject\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Subject;

class SubjectDatabaseSeeder extends Seeder
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
         * Subjects Seed
         * ------------------
         */

        // DB::table('subjects')->truncate();
        // echo "Truncate: subjects \n";

        Subject::factory()->count(20)->create();
        $rows = Subject::all();
        echo " Insert: subjects \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
