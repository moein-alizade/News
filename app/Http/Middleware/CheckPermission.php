<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $parameter)
    {
        $permission = Permission::query()
            ->where('title', '=', $parameter)
            ->firstOrFail();

        if(auth()->check() && !auth()->user()->role->hasPermission($permission))
        {
            abort(403);
        }

        return $next($request);
    }
}
