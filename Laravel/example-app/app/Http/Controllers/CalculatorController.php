<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculatorController extends Controller
{
    public function suma($num1, $num2)
    {
        $resultado = $num1 + $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }


    public function resta($num1, $num2)
    {
        $resultado = $num1 - $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }


    public function multiplicacion($num1, $num2)
    {
        $resultado = $num1 * $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }


    public function division($num1, $num2)
    {

        $resultado = $num1 / $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }


    public function exponente($base, $exponente)
    {
        $resultado = pow($base, $exponente);
        return response()->json(compact('base', 'exponente', 'resultado'));
    }
}
