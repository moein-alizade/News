<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Policies\CategoryPolicy;
use Illuminate\Auth\Access\Response;
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
          'App\Models\Category' => 'App\Policies\CategoryPolicy',
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
        //        Gate::define('create-category', function(User $user) {
        //           $permission = Permission::where('title', 'create-category')->first();
        //           return $user->role->hasPermission($permission);
        //        });




        Gate::define('read-category', [CategoryPolicy::class, 'viewAny']);




        Gate::define('create-category', [CategoryPolicy::class, 'create']);




         // اگه کاربر دسترسی ویرایش دسته بندی را داشت و دسته بندی معتبر و وجود داشت آنگاه بهش دسترسی ویراش دسته بندی را بده
        //        Gate::define('edit-category', function (User $user, Category $category) {
        //            $permission = Permission::where('title', 'update-category')->first();
        //            // چک می کند که یوزر دسترسی update-category را دارد یا خیر
        //            $isAuthorized =  $user->role->hasPermission($permission)
        //                && !empty($category);
        //
        //
        //
        //            // برای نمایش اعلان خطای سفارشی شده ی ما
        //            return $isAuthorized
        //                ? Response::allow()
        //                : Response::deny('شما مجاز نیستید');
        //
        //        });


        Gate::define('edit-category', [CategoryPolicy::class, 'update']);


        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);


        // call back function => check all methode
        Gate::define('manage-roles', function (User $user){
           return auth()->check() && auth()->user()->role->hasPermission('manage-roles');
        });

    }
}
