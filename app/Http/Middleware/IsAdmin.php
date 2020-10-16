<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // dd(User::with('roles')->find(1)->toArray());
        // dd(Auth::check());
        if (Auth::check() && isset(Auth::user()->roles[0]['pivot']['role_id'])) {
            if (Auth::user()->roles[0]['pivot']['role_id'] == 3) {
                return $next($request);
            }
        }
        return redirect()->back()->with('error','You are not admin');
        
    }
}
