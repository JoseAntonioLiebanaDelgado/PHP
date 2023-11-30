<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Suma;
use App\Http\Middleware\Resta;
use App\Http\Middleware\Multiplicacion;
use App\Http\Middleware\Division;
use App\Http\Middleware\Exponencial;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


use App\Http\Controllers\CalculatorController;

Route::get('/suma/{num1}/{num2}', [CalculatorController::class, 'suma']) -> middleware([Suma::class]);

Route::get('/resta/{num1}/{num2}', [CalculatorController::class, 'resta']) -> middleware([Resta::class]);

Route::get('/multiplicacion/{num1}/{num2}', [CalculatorController::class, 'multiplicacion']) -> middleware([Multiplicacion::class]);

Route::get('/division/{num1}/{num2}', [CalculatorController::class, 'division']) -> middleware([Division::class]);

Route::get('/exponente/{num1}/{num2}', [CalculatorController::class, 'exponente']) -> middleware([Exponencial::class]);
