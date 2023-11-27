<?php

session_start();
require_once '../db_config/db_connect.php';

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    try {
        $database = Database::getInstance();
        $conn = $database->getConnection();

        // Obtener los detalles del producto para mostrar en el formulario de actualización
        $sql_product_details = "SELECT * FROM Products WHERE id=?";
        $stmt_product_details = $conn->prepare($sql_product_details);
        $stmt_product_details->bind_param('i', $producto_id);

        // Ejecutar la consulta
        $stmt_product_details->execute();

        // Obtener el resultado
        $result_product_details = $stmt_product_details->get_result();

        // Obtener los detalles del producto
        $productDetails = $result_product_details->fetch_assoc();

        // Cerrar la consulta
        $stmt_product_details->close();
        // Cerrar la conexión a la base de datos
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Actualizar Producto</h2>

    <form action="procesar_actualizacion_productos.php" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($productDetails['name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" class="form-control" name="description" id="description" value="<?php echo htmlspecialchars($productDetails['description']); ?>">
        </div>

        <div class="form-group">
            <label for="brand">Marca:</label>
            <input type="text" class="form-control" name="brand" id="brand" value="<?php echo htmlspecialchars($productDetails['brand']); ?>">
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" name="price" id="price" min="0" value="<?php echo htmlspecialchars($productDetails['price']); ?>" required>
        </div>

        <div class="form-group">
            <label for="cost">Costo:</label>
            <input type="number" class="form-control" name="cost" id="cost" min="0" value="<?php echo htmlspecialchars($productDetails['cost']); ?>" required>
        </div>

        <div class="form-group">
            <label for="weight">Peso:</label>
            <input type="number" class="form-control" name="weight" id="weight" min="0" value="<?php echo htmlspecialchars($productDetails['weight']); ?>">
        </div>

        <div class="form-group">
            <label for="dimensions">Dimensiones:</label>
            <input type="text" class="form-control" name="dimensions" id="dimensions" value="<?php echo htmlspecialchars($productDetails['dimensions']); ?>">
        </div>

        <!-- Agregar el campo oculto para el ID del producto -->
        <input type="hidden" name="id" value="<?php echo $producto_id; ?>">

        <!-- Agregar el campo oculto para el campo last_updated -->
        <input type="hidden" name="last_updated" value="<?php echo $productDetails['last_updated']; ?>">

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>

<!-- Enlace a Bootstrap JS y jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
