<?php

require_once '../helpers/test_input.php';
require_once '../classes/User.php';
use Src\Classes\User;

$name = '';
$nameError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $nameError = 'Name is required';
    } else {
        $name = test_input($_POST['name']);
        $user = new User(null, $name);
        $success = $user->save();
        if ($success) {
            $_SESSION['message'] = "User $name created successfully";
        } else {
            $_SESSION['message'] = "User $name creation failed";
        }
        header('Location: ../index.php');
    }
}
