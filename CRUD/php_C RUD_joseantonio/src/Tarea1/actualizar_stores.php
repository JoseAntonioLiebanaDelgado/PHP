<?php
session_start();
require_once '../db_config/db_connect.php';

if (isset($_GET['id'])) {
    $store_id = $_GET['id'];

    try {
        $database = Database::getInstance();
        $conn = $database->getConnection();

        // Preparar la consulta SQL para obtener los datos de la tienda a actualizar
        $sql = "SELECT * FROM Stores WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $store_id);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los datos de la tienda
        $result = $stmt->get_result();
        $store = $result->fetch_assoc();

        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de tienda no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Tienda</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Actualizar Tienda</h2>

    <form action="procesar_actualizacion_stores.php" method="POST">
        <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">

        <!-- Mostrar los datos actuales de la tienda en los campos del formulario -->
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" class="form-control" name="city" id="city" value="<?php echo $store['city']; ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $store['address']; ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{9}" value="<?php echo $store['phone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $store['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="opening_time">Hora de Apertura (opcional):</label>
            <input type="text" class="form-control" name="opening_time" id="opening_time" value="<?php echo $store['opening_time']; ?>">
        </div>

        <div class="form-group">
            <label for="closing_time">Hora de Cierre (opcional):</label>
            <input type="text" class="form-control" name="closing_time" id="closing_time" value="<?php echo $store['closing_time']; ?>">
        </div>

        <!-- Agrega más campos según tus necesidades -->

        <button type="submit" class="btn btn-primary">Actualizar Tienda</button>
    </form>
</div>

<!-- Agrega el enlace al archivo JavaScript de Bootstrap y a jQuery si es necesario -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
