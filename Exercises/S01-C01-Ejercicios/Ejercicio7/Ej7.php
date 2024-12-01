<?php

/*<?php

// Dirección web
$url = "https://gracia.sallenet.org/login/index.php";

// Usamos basename() para obtener la parte final de la URL (index.php)
$archivo_con_extension = basename($url);

// Usamos substr() y strrpos() para eliminar la extensión ".php"
$archivo = substr($archivo_con_extension, 0, strrpos($archivo_con_extension, "."));

// Mostramos el resultado
echo "Nombre del archivo usando substrings: " . $archivo . "<br>";

?>
*/


//----------------------------------------------------------
// USANDO SUBSTR() Y STRRPOS()

// Dirección web
$url = "https://gracia.sallenet.org/login/index.php";

// Usamos basename() para obtener la parte final de la URL (index.php)
$archivo_con_extension = basename($url);

// Usamos substr() y strrpos() para eliminar la extensión ".php"
$archivo = substr($archivo_con_extension, 0, strrpos($archivo_con_extension, "."));

// Mostramos el resultado
echo "Nombre del archivo usando substrings: " . $archivo . "<br>";


/*basename($url): Obtiene el nombre del archivo (en este caso, index.php) desde la URL.
substr() y strrpos(): Con strrpos(), encuentras la posición del último punto (.) para luego extraer solo el nombre del archivo sin la extensión, usando substr().*/


//----------------------------------------------------------
// USANDO EXPLODE()

// Dirección web
$url = "https://gracia.sallenet.org/login/index.php";

// Usamos explode para dividir la URL por '/'
$partes = explode("/", $url);

// Obtenemos la última parte (index.php)
$archivo_con_extension = end($partes);

// Usamos explode de nuevo para quitar la extensión ".php"
$archivo = explode(".", $archivo_con_extension)[0];

// Mostramos el resultado
echo "Nombre del archivo usando explode: " . $archivo . "<br>";


/*explode("/", $url): Divide la URL en partes utilizando el separador /, lo que nos da un array.
end($partes): Obtiene la última parte del array, que es index.php.
explode(".", $archivo_con_extension)[0]: Divide el nombre del archivo por el separador . y toma la primera parte (que es index).*/