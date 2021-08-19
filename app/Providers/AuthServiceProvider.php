<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //  گیت ها تقریبا ساختاری مشابه روت ها دارند
        // define('تابع اکشن', 'دسترسی');
        Gate::define('create-category', function(User $user) {
            $permission = Permission::where('title', '=' , 'update-category')->first();
            return $user->role->hasPermission($permission);
        });



         // اگه کاربر دسترسی ویرایش دسته بندی را داشت و دسته بندی معتبر و وجود داشت آنگاه بهش دسترسی ویراش دسته بندی را بده
        Gate::define('edit-category', function(User $user, Category $category) {

            $permission = Permission::where('title', '=' , 'update-category')->first();

            return $user->role->hasPermission($permission)
                && !empty($category);
        });


    }
}
