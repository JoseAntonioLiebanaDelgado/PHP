<?php

require_once '../db_config/db_connect.php';
require_once '../helpers/test_input.php';
require_once '../db_config/Product.php';
use Src\db_config\db_connect;

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
    // Validar y procesar los datos del formulario de creación
    if ($name === null) {
        $nameError = 'Name is required';
    }

    if ($price === null) {
        $priceError = 'Price is required';
    }

    if ($cost === null) {
        $costError = 'Cost is required';
    }

    // Añade más validaciones según tus requisitos

    if (empty($nameError) && empty($priceError) && empty($costError)) {
        try {
            $database = Database::getInstance();
            $conn = $database->getConnection();

            // Preparar la consulta SQL para insertar la nueva tienda
            $sql = "INSERT INTO Products (name, description, brand, price, cost, weight,dimensions) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssddds', $name, $description, $brand, $price, $cost, $weight, $dimensions);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir a la página de lista de tiendas después de la inserción
            header("Location: index2.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos
            $conn = null;
        }
    }
}
