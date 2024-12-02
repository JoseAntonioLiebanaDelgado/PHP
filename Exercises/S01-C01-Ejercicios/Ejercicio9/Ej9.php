<?php

/*Ejercicio 05 # Tarea 02: Arrays - II
Crea un array multidimensional (un array que contiene arrays). Rellena la estructura con los datos siguientes:
Ciudad, País, Continente:
Tokyo, Japan, Asia; Mexico City, Mexico, North America; New York City, USA, North America; Mumbai, India, Asia; Seoul, Korea, Asia; Shanghai, China, Asia; Chicago, USA, North America; Buenos Aires, Argentina, South America; Cairo, Egypt, Africa; London, UK, Europe.

Devuelve el nombre de veces que aparece USA en la estructura y el nombre de veces que aparece North America.*/


// Crear el array multidimensional con los datos de ciudades, países y continentes
$ciudades = array(
    array("Tokyo", "Japan", "Asia"),
    array("Mexico City", "Mexico", "North America"),
    array("New York City", "USA", "North America"),
    array("Mumbai", "India", "Asia"),
    array("Seoul", "Korea", "Asia"),
    array("Shanghai", "China", "Asia"),
    array("Chicago", "USA", "North America"),
    array("Buenos Aires", "Argentina", "South America"),
    array("Cairo", "Egypt", "Africa"),
    array("London", "UK", "Europe")
);

// Inicializamos contadores para "USA" y "North America"
$contador_usa = 0;
$contador_north_america = 0;

// Recorremos el array multidimensional
foreach ($ciudades as $ciudad) {
    // Si el país es "USA", incrementamos el contador
    if ($ciudad[1] === "USA") {
        $contador_usa++;
    }
    
    // Si el continente es "North America", incrementamos el contador
    if ($ciudad[2] === "North America") {
        $contador_north_america++;
    }
}

// Mostramos los resultados
echo "El país 'USA' aparece $contador_usa veces en la estructura.<br>";
echo "El continente 'North America' aparece $contador_north_america veces en la estructura.<br>";


//---


/*Explicación del código:

$ciudades: Es un array multidimensional que contiene arrays con 3 elementos cada uno: ciudad, país y continente.

$contador_usa y $contador_north_america: Inicializamos dos variables para contar las veces que aparecen "USA" y "North America" en la estructura.

foreach ($ciudades as $ciudad): Utilizamos un bucle foreach para recorrer cada array dentro del array multidimensional $ciudades.

if ($ciudad[1] === "USA"): Dentro del bucle, verificamos si el segundo elemento del array ($ciudad[1]) es "USA". Si es así, incrementamos el contador de USA.

if ($ciudad[2] === "North America"): De manera similar, verificamos si el tercer elemento del array ($ciudad[2]) es "North America". Si es así, incrementamos el contador de North America.

echo: Imprimimos el resultado de cuántas veces aparecen "USA" y "North America".

---

Resultado esperado:
Al ejecutar este código, obtendrás algo como:

El país 'USA' aparece 2 veces en la estructura.
El continente 'North America' aparece 3 veces en la estructura.*/