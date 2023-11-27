<?php

require_once '../classes/User.php';
use Src\Classes\User;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_SESSION['id'])) {
        header('Location: ../index.php');
        die();
    }
    $user = new User($_SESSION['id'], null);
    $success = $user->delete();
    if ($success) {
        $_SESSION['message'] = 'User ' . $_SESSION['id'] . 'deleted successfully';
    } else {
        $_SESSION['message'] = 'User ' . $_SESSION['id'] . ' delete failed';
    }
    header('Location: ../index.php');
}
