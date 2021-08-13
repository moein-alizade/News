<?php

namespace App\Providers;

use App\Models\Category;
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
            return $user->role->hasPermission('create-category');
        });


        Gate::define('edit-category', function(User $user, Category $category) {
            // دسته بندی که سمت ما می آید حتما خالی نباشد
            return $user->role->hasPermission('update-category')
                    && !empty($category);
        });


    }
}
