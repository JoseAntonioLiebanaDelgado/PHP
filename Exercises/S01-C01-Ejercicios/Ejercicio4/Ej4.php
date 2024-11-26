<?php

/*Ejercicio 02 # Tarea 02: Variables - II
Imprime la fecha actual con los siguientes formatos:
2013/09/01 
13.09.01 
2001-03-10 17:16:18*/


// Establecer zona horaria predeterminada
date_default_timezone_set('UTC');

// Imprimir fecha actual con el formato 2013/09/01
echo date('Y/m/d') . '<br>';

// Imprimir fecha actual con el formato 13.09.01
echo date ('y.m.d') . '<br>';

// Imprimir fecha actual con el formato 2001-03-10 17:16:18
echo date ('Y-m-d H:i:s') . '<br>';


/*Y/m/d: Imprime la fecha actual en el formato Año/Mes/Día (por ejemplo, 2024/10/09).
y.m.d: Imprime la fecha actual con el año en formato de dos dígitos, separada por puntos . (por ejemplo, 24.10.09).
Y-m-d H:i:s: Imprime la fecha y la hora en el formato Año-Mes-Día Horas:Minutos:Segundos (por ejemplo, 2024-10-09 12:34:56).*/