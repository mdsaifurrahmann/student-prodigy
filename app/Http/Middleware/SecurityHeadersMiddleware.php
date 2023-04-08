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

      $response->headers->set('X-Content-Type-Options', 'nosniff');
      $response->headers->set('X-Download-Options', 'noopen');
      $response->headers->set('X-XSS-Protection', '1; mode=block');
      $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
      $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
      $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data: www.w3.org; font-src 'self' fonts.gstatic.com; connect-src 'self'; frame-ancestors 'none'; style-src-elem 'self' fonts.googleapis.com;");

      $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
      $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

      // Remove headers
      $response->headers->remove('X-Powered-By');
      $response->headers->remove('Platform');
      $response->headers->remove('Server');

      return $response;
   }
}
