<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class Installed
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (site_already_installed()) {
            return $next($request);
        }
        else
        {
            generate_symlink();

            return redirect()->route('LaravelInstaller::welcome');
        }

    }
}
