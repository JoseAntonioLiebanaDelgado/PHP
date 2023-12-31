<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Multiplicacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $num1 = $request->route('num1');
        $num2 = $request->route('num2');
        $validator = Validator::make(compact('num1', 'num2'), [
            'num1' => 'required|integer|gt:0',
            'num2' => 'required|integer|gt:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        return $next($request);
    }
}
