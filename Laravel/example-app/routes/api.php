<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/suma/{num1}/{num2}', [CalculatorController::class, 'suma']);
Route::get('/resta/{num1}/{num2}', [CalculatorController::class, 'resta']);
Route::get('/multiplicacion/{num1}/{num2}', [CalculatorController::class, 'multiplicacion']);
Route::get('/division/{num1}/{num2}', [CalculatorController::class, 'division']);
Route::get('/exponente/{num1}/{num2}', [CalculatorController::class, 'exponente']);
