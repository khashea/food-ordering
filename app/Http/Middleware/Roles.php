<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Roles
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
        if($request->user() == null)
            abort(403);

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null ;
        if(!$roles|| Auth::user()->hasRoles($roles)){
            return $next($request);
        }
        abort(403);
    }
}
