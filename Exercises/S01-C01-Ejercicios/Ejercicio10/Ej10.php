<?php

/*Ejercicio 06 # Tarea 01: Funciones - I
Crea 4 funciones que hagan la suma, resta, multiplicación i división de dos números. Una vez esto, llámalas  usando dos números a tu elección como parámetros e imprime el resultado en pantalla. Ten en cuenta también la división entre 0!*/


// Función suma
function suma($a, $b) {
    return $a + $b;
}

// Función resta
function resta($a, $b) {
    return $a - $b;
}

// Función multiplicación
function multiplicacion($a, $b) {
    return $a * $b;
}

// Función división
function division($a, $b) {
    // Verificamos si el segundo número es 0
    if ($b === 0) {
        return "Error: división por cero.";
    } else {
        return $a / $b;
    }
}

// Definimos dos números para realizar las operaciones
$num1 = 10;
$num2 = 5;

// Llamamos a las funciones y mostramos los resultados
echo "La suma de $num1 y $num2 es: " . suma($num1, $num2) . "<br>";
echo "La resta de $num1 y $num2 es: " . resta($num1, $num2) . "<br>";
echo "La multiplicación de $num1 y $num2 es: " . multiplicacion($num1, $num2) . "<br>";
echo "La división de $num1 y $num2 es: " . division($num1, $num2) . "<br>";

// Intentamos dividir por cero
echo "Intento de división por cero: " . division($num1, 0) . "<br>";