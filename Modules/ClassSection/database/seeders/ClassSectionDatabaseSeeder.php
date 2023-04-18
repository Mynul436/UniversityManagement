<?php

namespace Modules\ClassSection\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\ClassSection;

class ClassSectionDatabaseSeeder extends Seeder
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
         * ClassSections Seed
         * ------------------
         */

        // DB::table('classsections')->truncate();
        // echo "Truncate: classsections \n";

        ClassSection::factory()->count(20)->create();
        $rows = ClassSection::all();
        echo " Insert: classsections \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
