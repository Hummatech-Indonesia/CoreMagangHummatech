<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribeCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, mixed ...$type): Response
    {
        if(!auth()->user()->feature && in_array(auth()->user()->student->internship_type, $type)) {
            return abort(403, 'Anda Belum Berlangganan!');
        }

        return $next($request);
    }
}
