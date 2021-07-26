<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role (admin / author)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Laravel\Lumen\Http\Redirector|mixed|void
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::check() == false || Auth::user()->$role == false)
        {
            return redirect('/');
        }


        return $next($request);
    }
}
