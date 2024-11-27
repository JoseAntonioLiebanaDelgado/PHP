<?php

/*Ejercicio 03 # Tarea 01: Bucles
Escribe un script que calcule y devuelva por pantalla las 10 primeras potencias de 2 (2^2, 2^3, …) utilizando bucles.*/


//---------------------------------------------------------- 1 forma

for ($i = 2; $i <= 11; $i++) {
    echo "2^$i = " . pow(2, $i) . "<br>";
}

/*for ($i = 2; $i <= 11; $i++): Inicias el bucle desde 2 y lo mantienes hasta 11, lo cual asegura que cubres las 10 primeras potencias de 2.
pow(2, $i): Calcula la potencia de 2 en cada iteración.
echo "2^$i = " . pow(2, $i) . "<br>": Combinas el cálculo y la salida en una sola línea, imprimiendo el resultado directamente.*/

//---------------------------------------------------------- 2 forma

for ($i = 2; $i <= 11; $i++) {
    // Calculamos la potencia de 2
    $potencia = pow(2, $i);
    
    // Mostramos el resultado por pantalla
    echo "2^" . $i . " = " . $potencia . "<br>";
}

/*Utilizamos un bucle for para iterar desde 2 hasta 11. Esto nos permite calcular las potencias desde 2^2 hasta 2^11.
En cada iteración, calculamos la potencia utilizando la función pow(2, $i), que eleva 2 a la potencia de $i.
Mostramos el resultado en cada iteración usando echo, que concatena el exponente y el resultado.*/

//----------------------------------------------------------