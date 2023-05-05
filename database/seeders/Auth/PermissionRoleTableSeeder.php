<?php

namespace Database\Seeders\Auth;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // Create Roles
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        // $executive = Role::create(['name' => 'executive']);
        // $user = Role::create(['name' => 'user']);

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view_backend']);
        Permission::firstOrCreate(['name' => 'edit_settings']);
        Permission::firstOrCreate(['name' => 'view_logs']);

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        // Artisan::call('auth:permission', [
        //     'name' => 'posts',
        // ]);
        // echo "\n _Posts_ Permissions Created.";

        // Artisan::call('auth:permission', [
        //     'name' => 'categories',
        // ]);
        // echo "\n _Categories_ Permissions Created.";

        // Artisan::call('auth:permission', [
        //     'name' => 'tags',
        // ]);
        // echo "\n _Tags_ Permissions Created.";

        // Artisan::call('auth:permission', [
        //     'name' => 'comments',
        // ]);
      //  echo "\n _Results_ Permissions Created.";
        Artisan::call('auth:permission', [
            'name' => 'results',
        ]);
        echo "\n _Results_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'notices',
        ]);
        echo "\n _Notices_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'subjects',
        ]);
        echo "\n _Subjects_ Permissions Created.";
        Artisan::call('auth:permission', [
            'name' => 'standardorclasses',
        ]);
        echo "\n _StandardOrClasses_ Permissions Created.";
        Artisan::call('auth:permission', [
            'name' => 'sections',
        ]);
        echo "\n _Sections_ Permissions Created.";
        Artisan::call('auth:permission', [
            'name' => 'classsections',
        ]);
        echo "\n _ClassSections_ Permissions Created.";

        Artisan::call('auth:permission', [
            'name' => 'attendence',
        ]);
        echo "\n _Attendences_ Permissions Created.";

        echo "\n\n";

        // Assign Permissions to Roles
        $admin->givePermissionTo(Permission::all());
        $student->givePermissionTo(['view_notices', 'view_results', 'view_subjects', 'view_backend']);
        $teacher->givePermissionTo('view_backend');
        // $executive->givePermissionTo('view_backend');

        Schema::enableForeignKeyConstraints();
    }
}
