<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(getLanguages()->count()) {

            session('dir') ?? session()->put('dir', getLanguages('default')->dir);
            session('code') ?? session()->put('code', getLanguages('default')->code);

            app()->setLocale(session('code'));

        } else {

            app()->setLocale(app()->setLocale());

        }//en dof check

        return $next($request);

    }//end of handle

}//end of class