<?php

require_once '../db_config/db_connect.php';

if (isset($_GET['id'])) {
    $store_id = $_GET['id'];

    try {
        $database = Database::getInstance();
        $conn = $database->getConnection();

        // Preparar la consulta SQL para eliminar la tienda
        $sql = "DELETE FROM Stores WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $store_id);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a la página principal después de la eliminación
        header("Location: index1.php");
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        $conn = null;
    }
} else {
    echo "ID de tienda no proporcionado.";
}
