<?php

/*Ejercicio 06 # Tarea 03: Funciones -III
Haz un programa en php que dado un número entero positivo:
Calcule la suma y el producto de sus cifras
Identificar si es cap-i-cua*/ 


// Función para calcular la suma de las cifras de un número
function sumaCifras($numero) {
    $suma = 0;
    while ($numero > 0) {
        $suma += $numero % 10; // Obtenemos la última cifra
        $numero = intval($numero / 10); // Eliminamos la última cifra
    }
    return $suma;
}

// Función para calcular el producto de las cifras de un número
function productoCifras($numero) {
    $producto = 1;
    while ($numero > 0) {
        $producto *= $numero % 10; // Obtenemos la última cifra
        $numero = intval($numero / 10); // Eliminamos la última cifra
    }
    return $producto;
}

// Función para verificar si un número es capicúa
function esCapicua($numero) {
    $numero_str = strval($numero); // Convertimos el número a cadena de texto
    $numero_invertido = strrev($numero_str); // Invertimos la cadena
    return $numero_str === $numero_invertido; // Comparamos si es igual al original
}

// Pedimos al usuario que ingrese un número entero positivo
$numero = 12321; // Ejemplo de número, puedes cambiarlo

// Calculamos la suma de las cifras
$suma = sumaCifras($numero);
echo "La suma de las cifras de $numero es: $suma<br>";

// Calculamos el producto de las cifras
$producto = productoCifras($numero);
echo "El producto de las cifras de $numero es: $producto<br>";

// Verificamos si es capicúa
if (esCapicua($numero)) {
    echo "$numero es un número capicúa<br>";
} else {
    echo "$numero no es un número capicúa<br>";
}

