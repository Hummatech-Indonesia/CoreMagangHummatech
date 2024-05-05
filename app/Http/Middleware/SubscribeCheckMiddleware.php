<?php

namespace App\Http\Middleware;

use App\Enum\InternshipTypeEnum;
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
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->student->activeFeature == null || auth()->user()->student->activeFeature->is_active == '0') {
            return abort(403, 'Anda Belum Berlangganan!');
        }

        return $next($request);
    }
}
