<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BearerTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil header Authorization
        $header = $request->header('Authorization');

        // Pastikan format "Bearer <token>"
        if (!$header || !preg_match('/Bearer\s+(\S+)/', $header, $matches)) {
            return response()->json([
                'message' => 'Token not provided'
            ], 401);
        }

        $token = $matches[1]; // token diambil dari header

        // Contoh validasi token (sesuaikan sendiri)
        if ($token !== config('app.api_token')) {
            return response()->json([
                'message' => 'Invalid token'
            ], 401);
        }

        return $next($request);
    }
}
