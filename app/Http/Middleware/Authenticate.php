<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Verifique se o usuário está acessando a página inicial
        if ($request->is('/')) {
            return null;
        }

        return $request->expectsJson() ? null : route('login');
    }
}
