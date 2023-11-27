<?php

require_once 'Database.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: Login.php');
    exit();
}

$db = Database::getInstance();
$connection = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['id']);

    $stmt = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();

    header('Location: ManageUsers.php');
    exit();
} else {
    die("Acción no permitida");
}
