<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

use App\Models\permission;
use App\Models\User;
class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   $user = Auth::user();
        //dd(Route::getFacadeRoot()->current()->action['as']);
        
        if ($user) {
            $permissions = permission::all();
            foreach ($permissions as $key => $permission) {
                Gate::define($permission->slug, function (User $user) use ($permission) {
                    return $user->hasPermission($permission->slug);
                });
            }
        }
        return $next($request);
    }
}
