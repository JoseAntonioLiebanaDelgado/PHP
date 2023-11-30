<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Multiplicacion
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

    public function multiplicacion($num1, $num2)
    {
        $validator = Validator::make(compact('num1', 'num2'), [
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resultado = $num1 * $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }
}
