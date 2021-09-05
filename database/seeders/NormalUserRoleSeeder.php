<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class NormalUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role 'normal user'
        $normalUser = Role::query()->create([
           'title' => 'normal user'
        ]);

        // find permissions of normal user
        $permissions = Permission::query()
            ->whereIn('title',[
                'create-post',
                'read-post'
            ])
            ->get();


        // attach permissions to normalUser
        $normalUser->permissions()->attach($permissions);
    }
}
