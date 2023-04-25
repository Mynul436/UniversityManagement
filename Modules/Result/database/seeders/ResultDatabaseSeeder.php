<?php

namespace Modules\Result\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Result;

class ResultDatabaseSeeder extends Seeder
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
         * Results Seed
         * ------------------
         */

        // DB::table('results')->truncate();
        // echo "Truncate: results \n";

        Result::factory()->count(20)->create();
        $rows = Result::all();
        echo " Insert: results \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
