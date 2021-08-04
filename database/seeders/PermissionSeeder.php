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
        // Permission = model
        Permission::query()->insert([
            /**
             * category permission
             */
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


            /**
             * post permission
             */
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
    }
}
