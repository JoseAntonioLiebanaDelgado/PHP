<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css.php"> <!-- Cambiamos la extensión a .php -->
</head>
<body>

<div class="container">
    <h1>¿Qué quieres ver?</h1>

    <div class="button-container">
        <a href="Tarea1/index1.php">
            <img src="images/imgtiendas.jpg" alt="Imagen de Tiendas">
            <div class="button-text">Tiendas</div>
        </a>

        <a href="Tarea2/index2.php">
            <img src="images/imgproductos.jpg" alt="Imagen de Productos">
            <div class="button-text">Productos</div>
        </a>
    </div>
</div>

<script>
    // Agrega un script para cambiar la visibilidad del texto al hacer clic
    document.querySelectorAll('.button-container a').forEach(function (link) {
        link.addEventListener('click', function () {
            this.querySelector('.button-text').style.opacity = 1;
        });
    });
</script>

</body>
</html>
