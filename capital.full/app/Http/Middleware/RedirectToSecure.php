<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToSecure
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (true) {
        if (app()->environment('production')) {
            if (substr($request->header('Host'), 0, 4)  == 'www.') {
//                $request->headers->set('Host', 'capital.loc');
                $request->headers->set('Host', 'lombard-capital.com.ua');

                return redirect()->secure($request->path(), 301);
            }

            if (! $request->secure()) {
                return redirect()->secure($request->path(), 301);
            }
        }

        return $next($request);
    }
}
