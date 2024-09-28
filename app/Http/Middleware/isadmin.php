<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isadmin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
      // Check if the user is authenticated using the 'admin' guard
      if (auth()->guard('admin')->check()) {
          return $next($request); // Proceed if authenticated
      }

      // If the user is not authenticated, redirect them to the admin login page
      return redirect()->route('admin.login')->with('error', 'You are not authorized to access this page.');
  }
}
