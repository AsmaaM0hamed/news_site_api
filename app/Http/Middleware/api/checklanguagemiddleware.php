<?php

namespace App\Http\Middleware\api;

use Closure;
use Illuminate\Http\Request;

class checklanguagemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->hasHeader('locale'))
        {
            app()->setlocale( $request->header('locale'));
        }
        return $next($request);
    }
}
