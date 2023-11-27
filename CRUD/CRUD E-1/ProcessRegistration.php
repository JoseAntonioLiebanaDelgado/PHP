<?php

require_once 'Database.php';
require_once 'ValidacionesFormulario.php';

session_start();

$db = bd\Database::getInstance();
$connection = $db->getConnection();

$result = $connection->query("SHOW TABLES LIKE 'usuarios'");
if ($result->num_rows == 0) {
    $createTableSql = "
    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        apellidos VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        direccion VARCHAR(255),
        tarjeta VARCHAR(16),
        fecha_caducidad DATE,
        codigo_seguridad VARCHAR(3)
    )";

    $connection->query($createTableSql);
}

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$direccion = $_POST['direccion'];
$tarjeta = $_POST['tarjeta'];
$fecha_caducidad = $_POST['fecha_caducidad'];
$codigo_seguridad = $_POST['codigo_seguridad'];

$errors = [];

if (!bd\validacionesFormulario::validateName($nombre)) {
    $errors[] = "Nombre no válido.";
}

if (!bd\validacionesFormulario::validateName($apellidos)) {
    $errors[] = "Apellidos no válidos.";
}

if (!bd\validacionesFormulario::validateEmail($email)) {
    $errors[] = "Email no válido.";
}

if (!bd\validacionesFormulario::validatePassword($password)) {
    $errors[] = "Contraseña no válida.";
}

if ($password !== $confirm_password) {
    $errors[] = "Las contraseñas no coinciden.";
}

if (!bd\validacionesFormulario::validateCardNumber($tarjeta)) {
    $errors[] = "Número de tarjeta no válido.";
}

if (!bd\validacionesFormulario::validateExpiryDate($fecha_caducidad)) {
    $errors[] = "Fecha de caducidad no válida o ya pasada.";
}

if (!bd\validacionesFormulario::validateSecurityCode($codigo_seguridad)) {
    $errors[] = "Código de seguridad no válido.";
}

if (empty($errors)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $connection->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, direccion, tarjeta, fecha_caducidad, codigo_seguridad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssss", $nombre, $apellidos, $email, $hashedPassword, $direccion, $tarjeta, $fecha_caducidad, $codigo_seguridad);

    $stmt->execute();

    $_SESSION['id'] = $stmt->insert_id;

    $stmt->close();
}
header('Location: Register.php');
