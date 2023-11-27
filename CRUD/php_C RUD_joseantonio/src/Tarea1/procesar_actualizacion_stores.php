<?php

require_once '../db_config/db_connect.php';
require_once '../helpers/test_input.php';

$store_id = isset($_POST["store_id"]) ? test_input($_POST["store_id"]) : null;
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
    // Validar y procesar los datos del formulario de actualización
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

    // Validar que los valores de tiempo sean válidos si no están vacíos
    if (!empty($opening_time) && !isValidTime($opening_time)) {
        $openingTimeError = 'Invalid opening time format';
    }

    if (!empty($closing_time) && !isValidTime($closing_time)) {
        $closingTimeError = 'Invalid closing time format';
    }

    // Añade más validaciones según tus requisitos

    if (empty($cityError) && empty($addressError) && empty($phoneError) && empty($emailError) && empty($openingTimeError) && empty($closingTimeError)) {
        try {
            $database = Database::getInstance();
            $conn = $database->getConnection();

            // Preparar la consulta SQL para actualizar la tienda
            $sql = "UPDATE Stores SET city = ?, address = ?, phone = ?, email = ?, opening_time = ?, closing_time = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssii', $city, $address, $phone, $email, $opening_time, $closing_time, $store_id);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir a la página de lista de tiendas después de la actualización
            header("Location: index1.php");
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos
            $conn->close();
        }
    }
}

// Función para validar el formato de tiempo
function isValidTime($time)
{
    return (bool)strtotime($time);
}
