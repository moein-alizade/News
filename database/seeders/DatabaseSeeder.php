<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(PermissionSeeder::class);

        // متغیر هامون را بصورت آرایه ای براش بفرستیم و دیگه نیاز نیست برای هر سیدر که تعریف کنیم آنگاه یکبار تابع  call را اجرا یا فراخوانی کنیم
        $this->call([
            PermissionSeeder::class,
            AdminSeeder::class
        ]);

    }
}
