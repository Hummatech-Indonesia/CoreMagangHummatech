<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @link https://spatie.be/docs/laravel-permission/v6/basic-usage/role-permissions#content-checking-roles Documentation for role and permission
     * @link https://php.net/manual/en/function.array-map.php Documentation for array_map
     * @link https://php.net/manual/en/function.in-array.php Documentation for in_array
     * @link https://laravel.com/docs/11.x/errors#http-exceptions Documentation for 403 Forbidden HTTP Exception
     * @param  string[] $roles The roles array from middleware "roles:middleware1,middleware2,..."
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        # Check the role and throw 403 if user not match the roles
        if (
            !in_array(true, array_map(function ($role) {
                return auth()->user()->hasRole($role);
            }, $roles))
        ) {
            return abort(403, 'Anda tidak memiliki akses ke halaman ini!');
        }

        # Else, continue and next to another request
        return $next($request);
    }
}
