<?php

require_once '../db_config/db_connect.php';
require_once '../helpers/test_input.php';

$id = isset($_POST["id"]) ? test_input($_POST["id"]) : null;
$name = isset($_POST["name"]) ? test_input($_POST["name"]) : null;
$description = isset($_POST["description"]) ? test_input($_POST["description"]) : null;
$brand = isset($_POST["brand"]) ? test_input($_POST["brand"]) : null;
$price = isset($_POST["price"]) ? test_input($_POST["price"]) : null;
$cost = isset($_POST["cost"]) ? test_input($_POST["cost"]) : null;
$weight = isset($_POST["weight"]) ? test_input($_POST["weight"]) : null;
$dimensions = isset($_POST["dimensions"]) ? test_input($_POST["dimensions"]) : null;

$nameError = '';
$priceError = '';
$costError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y procesar los datos del formulario de actualización
    if ($name === null) {
        $nameError = 'Name is required';
    }

    if ($price === null) {
        $priceError = 'Price is required';
    }

    if ($cost === null) {
        $costError = 'Cost is required';
    }

    // Otras validaciones según tus requisitos

    if (empty($nameError) && empty($priceError) && empty($costError)) {
        try {
            $database = Database::getInstance();
            $conn = $database->getConnection();

            // Obtener la fecha y hora actual en formato MySQL
            $currentDate = date("");

            // Actualizar información del producto
            $sql_update_product = "UPDATE Products SET name=?, description=?, brand=?, price=?, cost=?, weight=?, dimensions=?, last_updated=? WHERE id=?";
            $stmt_update_product = $conn->prepare($sql_update_product);
            $stmt_update_product->bind_param('sssdddsii', $name, $description, $brand, $price, $cost, $weight, $dimensions, $currentDate, $id);
            $stmt_update_product->execute();
            $stmt_update_product->close();

            // Redirigir a la página de lista de productos después de la actualización
            header("Location: formulario_mostrar_stock_tienda.php");
            exit;
        } catch (Exception $e) {
            // Manejar el error apropiadamente
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos
            $conn->close();
        }
    }
}
