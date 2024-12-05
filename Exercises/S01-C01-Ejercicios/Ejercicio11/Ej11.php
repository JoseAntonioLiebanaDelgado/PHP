<?php

/*Ejercicio 06 # Tarea 02: Funciones - II
Haz un programa en php que pida un número entero positivo n i que calcule los n primeros términos de la serie de Fibonnacci usando la estructura de bucle do...while.
Nota: Ten en cuenta que si n = 6, es necesario que se escriba 1, 1, 2, 3, 5, 8 (es decir, los 6 primeros términos).*/

// Función para calcular los n primeros términos de la serie de Fibonacci
function fibonacci($n) {
    // Inicializamos los primeros dos términos de la serie
    $a = 1;
    $b = 1;
    
    // Mostramos los dos primeros términos
    echo "$a, $b";
    
    // Inicializamos un contador para los términos restantes
    $contador = 2;
    
    // Bucle do...while para calcular los términos restantes
    do {
        // Calculamos el siguiente término
        $c = $a + $b;
        
        // Mostramos el término calculado
        echo ", $c";
        
        // Actualizamos los valores de los términos
        $a = $b;
        $b = $c;
        
        // Incrementamos el contador
        $contador++;
    } while ($contador < $n);
}

// Pedimos al usuario que ingrese un número entero positivo
$n = 6;

// Verificamos si el número ingresado es positivo
if ($n > 0) {
    // Llamamos a la función fibonacci con el número ingresado
    fibonacci($n);
} else {
    echo "Por favor, ingrese un número entero positivo.";
}