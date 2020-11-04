<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class IsAdmin
{
    use HasRoles;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::check()  ) {
            dd(1);
            if (
                Auth::user()->roles[0]['pivot']['role_id'] !== 1
                || Auth::user()->roles[0]['pivot']['role_id'] == 2
            ) {
                return $next($request);
            }
            return redirect()->route('admin.logout');
        }
    }
}
