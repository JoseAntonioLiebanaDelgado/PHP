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

    // Preparar la consulta SQL para eliminar el producto
    $sql = "DELETE FROM Products WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    // Ejecutar la consulta
    $stmt->execute();

    // Redirigir a la página de lista de productos después de la eliminación
    header("Location: index2.php");
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión a la base de datos
    $conn = null;
}

