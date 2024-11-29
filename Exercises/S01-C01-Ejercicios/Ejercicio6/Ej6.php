<?php

/*Ejercicio 04 # Tarea 01: Strings - I
Crea una variable llamada “texto” con el valor “Hello world!”
Imprímela por pantalla
Imprímela pasando todas las letras a mayúsculas y luego minúsculas
Cuenta el número de dígitos de la variable “texto”*/


// Crear una variable llamada "texto" con el valor "Hello world!"
$texto = "Hello word!";

// Imprimir la variable "texto" por pantalla
echo $texto . "<br>";

// Imprimir la variable "texto" en mayúsculas
echo strtoupper($texto) . "<br>";

// Imprimir la variable "texto" en minúsculas
echo strtolower($texto) . "<br>";

// Contar el número de caracteres de la variable "texto"
echo "Número de caracteres: " . strlen($texto) . "<br>";

// Contar el número de palabras de la variable "texto"
echo "Número de palabras: " . str_word_count($texto) . "<br>";