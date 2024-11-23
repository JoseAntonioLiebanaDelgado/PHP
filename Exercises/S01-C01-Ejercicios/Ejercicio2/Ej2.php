<?php

/* Ejercicio 01 # Tarea 02: Información básica de PHP - II
Muestra por pantalla la información básica sobre HTTP_USER_AGENT y HTTP_HOST */

// Mostrar agente de usuario
echo "Agente de usuario: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";

// Mostrar el host
echo "El host es: " . $_SERVER['HTTP_HOST'];

// $_SERVER['HTTP_USER_AGENT']: Obtiene información sobre el navegador y el sistema operativo que está haciendo la solicitud. Básicamente, identifica el software cliente que accede a la página.
// $_SERVER['HTTP_HOST']: Muestra el nombre del host (dominio) que se utiliza para acceder al servidor.