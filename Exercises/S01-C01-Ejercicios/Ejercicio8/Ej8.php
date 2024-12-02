<?php

/*Ejercicio 05 # Tarea 01: Arrays - I
Rellena un array con 5 nombre de colores. Devuelve por pantalla los 5 colores en una misma cadena de texto. Separados por comas. Usa bucles.*/ 


$colores = array("Rojo", "Azul", "Verde", "Amarillo", "Negro");

// Inicia un bucle que recorre todos los elementos del array
for ($i = 0; $i < count($colores); $i++) {
    
    // Imprime el color actual del array
    echo $colores[$i];
    
    // Si no es el último elemento del array, imprime una coma y un espacio
    if ($i < count($colores) - 1) {
        echo ", ";
    }
}
