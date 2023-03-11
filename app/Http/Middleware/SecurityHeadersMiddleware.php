<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   public function handle($request, Closure $next)
   {
      $response = $next($request);

      $response->header('X-Content-Type-Options', 'nosniff');
      $response->header('X-Download-Options', 'noopen');
      $response->header('X-XSS-Protection', '1; mode=block');
      $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
      $response->header('X-Frame-Options', 'SAMEORIGIN');
      $response->header('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self'; font-src 'self'; connect-src 'self'; frame-ancestors 'none';");

      return $response;
   }

}
