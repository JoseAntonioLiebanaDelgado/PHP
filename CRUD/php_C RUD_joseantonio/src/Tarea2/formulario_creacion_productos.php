<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Crear Nuevo Producto</h2>

    <form action="procesar_creacion_productos.php" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="form-group">
            <label for="brand">Marca:</label>
            <input type="text" class="form-control" name="brand" id="brand">
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" name="price" id="price" min="0" required>
        </div>

        <div class="form-group">
            <label for="cost">Costo:</label>
            <input type="number" class="form-control" name="cost" id="cost" min="0" required>
        </div>

        <div class="form-group">
            <label for="weight">Peso:</label>
            <input type="number" class="form-control" name="weight" id="weight" min="0">
        </div>

        <div class="form-group">
            <label for="dimensions">Dimensiones:</label>
            <input type="text" class="form-control" name="dimensions" id="dimensions">
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>

<!-- Enlace a Bootstrap JS y jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
