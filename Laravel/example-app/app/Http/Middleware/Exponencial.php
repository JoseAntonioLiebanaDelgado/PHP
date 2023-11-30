<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Exponencial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function exponente($base, $exponente)
    {
        $validator = Validator::make(compact('base', 'exponente'), [
            'base' => 'required|numeric|between:0,5',
            'exponente' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resultado = pow($base, $exponente);
        return response()->json(compact('base', 'exponente', 'resultado'));
    }
}
