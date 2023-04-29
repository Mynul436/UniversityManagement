<?php

namespace Modules\Attendence\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Attendence;

class AttendenceDatabaseSeeder extends Seeder
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
         * Attendences Seed
         * ------------------
         */

        // DB::table('attendences')->truncate();
        // echo "Truncate: attendences \n";

        Attendence::factory()->count(20)->create();
        $rows = Attendence::all();
        echo " Insert: attendences \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
