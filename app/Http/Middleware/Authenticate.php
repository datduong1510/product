<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $is_api_request = $request->route()->getPrefix() === 'api';
        if ($is_api_request) {
            return ;
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
