<?php

require_once '../db_config/db_connect.php';
require_once '../helpers/test_input.php';
require_once '../db_config/Product.php';
use Src\db_config\db_connect;

// Obtener el ID del producto a eliminar desde la URL
$id = isset($_GET["id"]) ? test_input($_GET["id"]) : null;

// Verificar si el ID del producto está presente
if ($id === null) {
    echo "ID del producto no proporcionado.";
    exit;
}

try {
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Obtener los detalles del producto para mostrar en la vista de confirmación
    $sql = "SELECT * FROM Products WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Obtener los detalles del producto
    $productDetails = $result->fetch_assoc();

    // Cerrar la consulta
    $stmt->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión a la base de datos
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Confirmar Eliminación</h2>

    <p>¿Estás seguro de que deseas eliminar el siguiente producto?</p>

    <p><strong>ID:</strong> <?php echo htmlspecialchars($productDetails['id']); ?></p>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($productDetails['name']); ?></p>
    <!-- Agrega más detalles del producto según sea necesario -->

    <form action="procesar_eliminar_productos.php?id=<?php echo $id; ?>" method="POST">
        <button type="submit" class="btn btn-danger">Eliminar Producto</button>
        <a href="index2.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Enlace a Bootstrap JS y jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
