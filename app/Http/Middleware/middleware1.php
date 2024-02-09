<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class middleware1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $r = $next($request);
        echo "<script>console.log('this is middleware 1' );</script>";
        if ($request->route()->named('profile1')) {
            echo "<script>console.log('this is a named route----' );</script>";
        }
        return $r;
    }
}
