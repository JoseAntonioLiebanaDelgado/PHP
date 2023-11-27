<?php

require_once '../db_config/db_connect.php';

try {
    $database = Database::getInstance();
    $conn = $database->getConnection();

    // Obtener la lista de tiendas y su stock
    $sql_stores = "SELECT s.id, s.address, sp.stock_quantity
                   FROM Stores s
                   LEFT JOIN Stores_Products sp ON s.id = sp.id_store";
    $result_stores = $conn->query($sql_stores);

    if ($result_stores->num_rows > 0) {
        $stores = $result_stores->fetch_all(MYSQLI_ASSOC);
    } else {
        $stores = [];
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tiendas</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Lista de Tiendas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stores as $store) : ?>
                <tr>
                    <td><?php echo $store['id']; ?></td>
                    <td><?php echo $store['address']; ?></td>
                    <td>
                        <form action="procesar_mostrar_stock_tienda.php" method="POST">
                            <!-- Agregar el campo oculto para el ID de la tienda -->
                            <input type="hidden" name="store_id" value="<?php echo $store['id']; ?>">
                            <input type="number" name="stock_quantity" value="<?php echo $store['stock_quantity']; ?>">
                            <button type="submit" class="btn btn-primary">Actualizar Stock</button>
                            <!-- Agregar el botón de cancelar -->
                            <a href="index2.php" class="btn btn-secondary">No actualizar Stock e ir al submenú</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Enlace a Bootstrap JS y jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>