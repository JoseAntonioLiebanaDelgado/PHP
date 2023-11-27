<?php

header("Content-type: text/css");

?>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: url('images/imgbackground.jpg') center/cover fixed; /* Cambia 'ruta_de_tu_imagen.jpg' por la ruta de tu imagen */
}

.container {
    text-align: center;
}

h1 {
    color: #fff;
    font-size: 2.5em;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Sombra del texto */
    margin-bottom: 20px;
}

.button-container {
    display: flex;
    justify-content: space-around; /* Espaciado alrededor de los elementos */
    align-items: center;
}

.button-container a {
    display: block;
    position: relative; /* Añadido para posicionar el fondo oscuro */
    overflow: hidden; /* Oculta el desbordamiento de la imagen */
    border-radius: 5px;
    margin: 10px;
    text-decoration: none;
    color: #fff; /* Color del texto */
}

.button-container a img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    transition: transform 0.3s, filter 0.3s; /* Transición para la escala de la imagen y filtro de color */
}

.button-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2em; /* Tamaño del texto */
    color: #fff;
    font-family: 'Arial Black', sans-serif; /* Estilo de fuente */
    letter-spacing: 2px; /* Espaciado entre letras */
    opacity: 0; /* Inicialmente transparente */
    transition: opacity 0.3s; /* Transición de opacidad */
}

.button-container a:hover img {
    transform: scale(1.1); /* Aumenta ligeramente el tamaño de la imagen al pasar el ratón */
    filter: brightness(0.7); /* Hace la imagen más oscura al pasar el ratón */
}

.button-container a:hover .button-text {
    opacity: 1; /* Hacer visible al pasar el ratón */
}
