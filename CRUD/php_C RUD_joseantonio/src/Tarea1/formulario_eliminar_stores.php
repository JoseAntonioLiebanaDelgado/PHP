<?php

require_once '../db_config/db_connect.php';

if (isset($_GET['id'])) {
    $store_id = $_GET['id'];

    try {
        $database = Database::getInstance();
        $conn = $database->getConnection();

        // Obtener los detalles de la tienda para mostrar en la vista de confirmación
        $sql = "SELECT * FROM Stores WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $store_id);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Obtener los detalles de la tienda
        $storeDetails = $result->fetch_assoc();

        // Cerrar la consulta
        $stmt->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        $conn = null;
    }
} else {
    echo "ID de tienda no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Confirmar Eliminación</h2>

    <p>¿Estás seguro de que deseas eliminar la siguiente tienda?</p>

    <p><strong>ID:</strong> <?php echo htmlspecialchars($storeDetails['id']); ?></p>
    <p><strong>Ciudad:</strong> <?php echo htmlspecialchars($storeDetails['city']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($storeDetails['email']); ?></p>
    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($storeDetails['phone']); ?></p>

    <form action="procesar_eliminar_stores.php?id=<?php echo $store_id; ?>" method="POST">
        <button type="submit" class="btn btn-danger">Eliminar Tienda</button>
        <a href="index1.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
