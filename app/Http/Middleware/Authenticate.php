<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        Log::info('Autenticación Middleware: Ingreso al middleware');
        Log::info('Guardias:', [$guards]);

        // Ajustar el guardia correcto
        if ($this->auth->guard('sanctum')->guest()) {
            Log::warning('Usuario no autenticado');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Log::info('Usuario autenticado, continuando...');
        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
