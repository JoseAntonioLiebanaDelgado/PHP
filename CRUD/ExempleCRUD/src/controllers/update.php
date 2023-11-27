<?php

require_once '../helpers/test_input.php';
require_once '../classes/User.php';
use Src\Classes\User;

$name = '';
$nameError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_SESSION['id'])) {
        header('Location: ../index.php');
        die();
    }
    if (empty($_POST['name'])) {
        $nameError = 'Name is required';
    } else {
        $name = test_input($_POST['name']);
        $user = new User($_SESSION['id'], $name);
        $success = $user->update();
        if ($success) {
            $_SESSION['message'] = 'User ' . $_SESSION['id'] . ' updated successfully';
        } else {
            $_SESSION['message'] = 'User ' . $_SESSION['id'] . ' update failed';
        }
        header('Location: ../index.php');
    }
}
