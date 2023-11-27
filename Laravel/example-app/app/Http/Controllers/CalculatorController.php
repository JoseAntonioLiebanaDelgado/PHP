<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculatorController extends Controller
{
    public function suma($num1, $num2)
    {
        $validator = Validator::make(compact('num1', 'num2'), [
            'num1' => 'required|integer|gt:0',
            'num2' => 'required|integer|gt:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resultado = $num1 + $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
    }


    public function resta($num1, $num2)
    {
        $validator = Validator::make(compact('num1', 'num2'), [
            'num1' => 'required|integer',
            'num2' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resultado = $num1 - $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
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


    public function division($num1, $num2)
    {
        $validator = Validator::make(compact('num1', 'num2'), [
            'num1' => 'required|numeric',
            'num2' => 'required|numeric|not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resultado = $num1 / $num2;
        return response()->json(compact('num1', 'num2', 'resultado'));
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
