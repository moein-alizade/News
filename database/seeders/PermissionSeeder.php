<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * category permission
         */

        // Permission = model
        Permission::query()->insert([
            [
                'title' => 'create-category'
            ],
            [
                'title' => 'read-category'
            ],
            [
                'title' => 'update-category'
            ],
            [
                'title' => 'delete-category'
            ],
        ]);


        /**
         * post permission
         */
        Permission::query()->insert([
            [
                'title' => 'create-post'
            ],
            [
                'title' => 'read-post'
            ],
            [
                'title' => 'update-post'
            ],
            [
                'title' => 'delete-post'
            ],
        ]);


        /**
         * role permission
         */
        Permission::query()->insert([
            [
                'title' => 'create-role'
            ],
            [
                'title' => 'read-role'
            ],
            [
                'title' => 'update-role'
            ],
            [
                'title' => 'delete-role'
            ],
        ]);
    }
}
