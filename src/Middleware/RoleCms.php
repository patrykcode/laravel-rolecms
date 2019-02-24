<?php

namespace RoleCms\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCms {

    protected $user;

    public function handle($request, Closure $next, $role = null) {

        if ($role && Auth::user()->is($role)) {
            return $next($request);
        }

        return redirect()->route(config('rolecms.default_route'));
    }

}
