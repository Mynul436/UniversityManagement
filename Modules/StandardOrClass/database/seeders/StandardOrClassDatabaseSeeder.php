<?php

namespace Modules\StandardOrClass\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\StandardOrClass;

class StandardOrClassDatabaseSeeder extends Seeder
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
         * StandardOrClasses Seed
         * ------------------
         */

        // DB::table('standardorclasses')->truncate();
        // echo "Truncate: standardorclasses \n";

        StandardOrClass::factory()->count(20)->create();
        $rows = StandardOrClass::all();
        echo " Insert: standardorclasses \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
