<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Admin user
     * @return void
     */
    public function run()
    {
        $admin = Role::query()->create([
            'title' => 'admin'
        ]);


        // اختصاص دادن تمام دسترسی های موجود به کاربر ادمین
        $admin->permissions()->attach(Permission::all());


        // Insert admin user to database
        // insert() => چون نتیجه اش را نمی خواهیم هر جایی ذخیره کنیم یا برگردانیم
        User::query()->insert([
            'role_id' => $admin->id,
            'name' => 'moein',
            'mobile' => '09120003015',
            'email' => 'moein@gmail.com',
            'password' => bcrypt('12345')
        ]);


    }
}
