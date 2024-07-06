<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsFuncionario
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->tipo === 'funcionario') {
            return $next($request);
        }

        return response()->json(['message' => 'Acesso negado. Apenas funcionários podem cadastrar carros.'], 403);
    }
}
