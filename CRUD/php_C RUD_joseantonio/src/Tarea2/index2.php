<?php

require_once '../db_config/db_connect.php';
use Src\db_config\db_connect;

$db = Database::getInstance();
$conn = $db->getConnection();

$sql = "SELECT * FROM Products";
$list_products = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Lista de Productos</h2>

    <!-- Botón para crear un nuevo producto -->
    <a href="formulario_creacion_productos.php" class="btn btn-primary mb-3">Crear nuevo producto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $list_products->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>
                        <!-- Botón para actualizar el producto -->
                        <a href="formulario_actualizacion_productos.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Actualizar</a>
                        <!-- Botón para confirmar eliminación -->
                        <a href="formulario_eliminar_productos.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este Producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary">Ir Atrás</a>
</div>

<!-- Enlace a Bootstrap JS y jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
