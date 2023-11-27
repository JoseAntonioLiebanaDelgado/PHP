<?php

require_once '../db_config/db_connect.php';
require_once '../helpers/test_input.php';
require_once '../db_config/Store.php';
use Src\db_config\Store;

$city = isset($_POST["city"]) ? test_input($_POST["city"]) : null;
$address = isset($_POST["address"]) ? test_input($_POST["address"]) : null;
$phone = isset($_POST["phone"]) ? test_input($_POST["phone"]) : null;
$email = isset($_POST["email"]) ? test_input($_POST["email"]) : null;
$opening_time = isset($_POST["opening_time"]) ? test_input($_POST["opening_time"]) : null;
$closing_time = isset($_POST["closing_time"]) ? test_input($_POST["closing_time"]) : null;

$cityError = '';
$addressError = '';
$phoneError = '';
$emailError = '';
$openingTimeError = '';
$closingTimeError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y procesar los datos del formulario de creación
    if ($city === null) {
        $cityError = 'City is required';
    }

    if ($address === null) {
        $addressError = 'Address is required';
    }

    if ($phone === null) {
        $phoneError = 'Phone is required';
    }

    if ($email === null) {
        $emailError = 'Email is required';
    }

    // Añade más validaciones según tus requisitos

    if (empty($cityError) && empty($addressError) && empty($phoneError) && empty($emailError) && empty($openingTimeError) && empty($closingTimeError)) {
        try {
            $database = Database::getInstance();
            $conn = $database->getConnection();

            // Preparar la consulta SQL para insertar la nueva tienda
            $sql = "INSERT INTO Stores (city, address, phone, email, opening_time, closing_time) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssii', $city, $address, $phone, $email, $opening_time, $closing_time);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir a la página de lista de tiendas después de la inserción
            header("Location: index1.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos
            $conn = null;
        }
    }
}
