<?php

session_start();
require_once 'procesar_creacion_stores.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Tienda</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Crear Nueva Tienda</h2>

    <form action="procesar_creacion_stores.php" method="POST">
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <select class="form-control" name="city" id="city" required>
                <!-- Opciones de ciudades obtenidas de la base de datos -->
                <option value="1">Ciudad 1</option>
                <option value="2">Ciudad 2</option>
                <!-- Agrega más opciones según tus ciudades disponibles -->
            </select>
        </div>

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" class="form-control" name="address" id="address" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{9}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="opening_time">Hora de Apertura (opcional):</label>
            <input type="time" class="form-control" name="opening_time" id="opening_time" min="1" max="24">
        </div>

        <div class="form-group">
            <label for="closing_time">Hora de Cierre (opcional):</label>
            <input type="time" class="form-control" name="closing_time" id="closing_time" min="1" max="24">
        </div>

        <button type="submit" class="btn btn-primary">Crear Tienda</button>
    </form>
</div>

<!-- Agrega el enlace al archivo JavaScript de Bootstrap y a jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
