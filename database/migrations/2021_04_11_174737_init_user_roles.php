<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        $adminRole = Role::create(['code' => 'admin', 'title' => 'Administrator']);
        $managerRole = Role::create(['code' => 'manager', 'title' => 'Manager']);
        $clientRole = Role::create(['code' => 'client', 'title' => 'Client']);

        $user = new User();
        $user->name = 'Admin';
        $user->email = env('ADMIN_EMAIL');
        $user->password = Hash::make(env('ADMIN_PASSWORD'));
        $user->save();
        $user->roles()->attach($adminRole);
        $user->roles()->attach($managerRole);
        $user->roles()->attach($clientRole);

        $user = new User();
        $user->name = 'Manager';
        $user->email = env('MANAGER_EMAIL');
        $user->password = Hash::make(env('MANAGER_PASSWORD'));
        $user->save();
        $user->roles()->attach($managerRole);

//        $user = new User();
//        $user->name = 'Client';
//        $user->email = 'client@example.com';
//        $user->password = Hash::make('password');
//        $user->save();
//        $user->roles()->attach($clientRole);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user_role')->delete();
        DB::table('users')->delete();
        DB::table('roles')->delete();
    }
}
