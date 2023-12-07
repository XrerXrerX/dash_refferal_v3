<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUsernamelogin
{
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('usernamelogin')) {
            return $next($request);
        }

        return redirect()->route('/');
    }
}
