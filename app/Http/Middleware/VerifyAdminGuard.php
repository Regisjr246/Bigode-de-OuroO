<?php

namespace App\Http\Middleware;

use App\Models\Adiministrador;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyAdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user() instanceof Adiministrador) {
            return response()->json([
                'status' => false,
                'message' => 'Não é uma instacia de ADM'
            ]);
        }
        else{
            return response()->json([
                'status' => true,
                'message' => 'é uma instacia de ADM'
            ]);
        }
        return $next($request);
    }
}
