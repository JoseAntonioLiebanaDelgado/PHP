<?php

require_once '../db_config/db_connect.php';

$database = Database::getInstance();
$conn = $database->getConnection();
$query = "SELECT * FROM Stores";
$result = mysqli_query($conn, $query);

if ($result) {
    $stores = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $stores = array();
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Tiendas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Lista de Tiendas</h2>

    <a href="crear_stores.php" class="btn btn-primary mb-3">Crear nueva tienda</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($stores)) {
                foreach ($stores as $store) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($store['id']); ?></td>
                        <td><?php echo htmlspecialchars($store['city']); ?></td>
                        <td><?php echo htmlspecialchars($store['email']); ?></td>
                        <td><?php echo htmlspecialchars($store['phone']); ?></td>
                        <td>
                            <a href="actualizar_stores.php?id=<?php echo $store['id']; ?>" class="btn btn-sm btn-warning">Actualizar</a>
                            <a href="formulario_eliminar_stores.php?id=<?php echo $store['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tienda?')">Eliminar</a>
                        </td>
                    </tr>
            <?php endforeach;
            } else {
                echo '<tr><td colspan="5">No hay tiendas disponibles.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary">Ir Atrás</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
