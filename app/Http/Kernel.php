<?php

namespace App\Http;

use App\Http\Middleware\CheckPermission;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,

        // PreventRequestsDuringMaintenance => مدیریت حالت نگهداری سایت را برعهده دارد و بررسی می کند که آیا یک فایل خاصی وجود دارد یا خیر و این فایل را ایجاد می کند
        // Maintenance => سایتمان را از حالت در دسترس خارج کنیم و به حالت نگهداری برود
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // ValidatePostSize => بررسی می کند که یک درخواستی سمت ما میاد بیشتر از اندازه ای در فایل کانفیگ پی اچ پی سرور ما وجود دارد بیشتر نشود مثلا ایکسپشن های سطح پایین نمایش داده نشود
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // TrimStrings => اضافی وجود داشته باشد، آنها را حذفشان می کند که باعث ناهم خوانی داده ها نشود و از تفاوتها جلوگیری می کند برای چک کردن یکتا بودن یک رکورد خاصی کارکرد دارد  space در ابتدا و انتهای رشته اگه یک
        \App\Http\Middleware\TrimStrings::class,

        // ConvertEmptyStringsToNull => تبدیل می کند null مثلا کاربر فیلد ایمیل را بصورت یک رشته خالی برای ما بر می گرداند و آن رشته ی خالی را به  ، null تبدیل رشته خالی به
        // برای اینکه مدیریت راحت تره و درخواست ها یکدست تر می شوند
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */

    protected $routeMiddleware = [
        // auth => چک می کرد که کاربر حتما لاگین کرده باشد
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // guest => را انجام می دهد یعنی چک می کند که کاربر حتما بصورت ناشناس باشد و لاگین نکرده باشد  auth عکس کار
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'permission' => CheckPermission::class,
    ];
}
