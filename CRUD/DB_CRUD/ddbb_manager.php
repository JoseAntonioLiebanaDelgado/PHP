<?php

session_start();

// Conexión a la base de datos (reemplaza los datos de conexión)
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$info_validated = false;
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $info_validated = false;
    $name = $surname = $email = $password = $confirm_password = $address = $card_number = $card_date = $card_code = "";
    $name_error = $surname_error = $email_error = $password_error = $confirm_password_error
    = $address_error = $card_number_error = $card_date_error = $card_code_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Name Validation
        if (empty($_POST["name"])) {
            $_SESSION['name_error'] = "You must fill in the name!";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $_SESSION['name_error'] = "Your name can only be with letters from the alfabet and spaces!";
            }
        }
        // Surname Validation
        if (empty($_POST["surname"])) {
            $_SESSION['surname_error'] = "You must fill in the surname!";
        } else {
            $surname = test_input($_POST["surname"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $surname)) {
                $_SESSION['surname_error'] = "Your surname can only be with letters from the alfabet and spaces!";
            }
        }

        // Email Validation
        if (empty($_POST["email"])) {
            $_SESSION['email_error'] = "You must fill in the email!";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['email_error'] = "Invalid email format!";
            }
        }

        // Password Validation
        if (empty($_POST["password"])) {
            $_SESSION['password_error'] = "You must fill in the password!";
        } else {
            $password = test_input($_POST["password"]);
            if (strlen($password) < 8) {
                $_SESSION['password_error'] = "The password must have a minimum of 8 characters!";
            }
        }

        // Password Repeat Validation
        if (empty($_POST["confirm_password"])) {
            $_SESSION['confirm_password_error'] = "You must re-write your password!";
        } else {
            $confirm_password = test_input($_POST["confirm_password"]);
            if ($confirm_password !== $password) {
                $_SESSION['confirm_password_error'] = "The passwords don't match!";
            }
        }

        //Address is not mandatory
        $address = test_input($_POST["address"]);

        //Card number not mandatory and needs to have 16 digits
        if (!empty($_POST["card_number"])) {
            $card_number = test_input($_POST["card_number"]);
            if (!preg_match("/^[0-9]{16}$/", $card_number)) {
                $_SESSION['card_number_error'] = "The card number has to be of 16 digits!";
            } else {
                // If filling up the card number, expiry date has to be in the future of the present date
                if (empty($_POST["card_date"])) {
                    $_SESSION['card_date_error'] = "The expiry date is mandatory if you put your card!";
                } else {
                    $card_date = test_input($_POST["card_date"]);
                    $today = date("Y-m-d");
                    if ($card_date < $today) {
                        $_SESSION['card_date_error'] = "The expiring date has to be in the future";
                    }
                }
                // Card code can only be 3 digits
                if (empty($_POST["card_code"])) {
                    $_SESSION['card_code_error'] = "El código de seguridad es obligatorio si se introduce una tarjeta.";
                } else {
                    $card_code = test_input($_POST["card_code"]);
                    if (!preg_match("/^[0-9]{3}$/", $card_code)) {
                        $_SESSION['card_code_error'] = "El código de seguridad debe contener solo 3 números.";
                    } else {
                        $info_validated = true;
                    }
                }
            }
        }

        if ($info_validated == true) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                surname VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                hashed_password VARCHAR(255) NOT NULL,
                address VARCHAR(255),
                card_number VARCHAR(16),
                card_date DATE,
                card_code VARCHAR(3)
            )";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $sql = "INSERT INTO users (name, surname, email, hashed_password, address, card_number, card_date, card_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            try {
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$name, $surname, $email, $hashed_password, $address, $card_number, $card_date, $card_code])) {
                    $lastInsertId = $conn->insert_id;
                    $_SESSION['user_id'] = $lastInsertId;

                    if (isset($_SESSION['user_id'])) {
                        header("Location: users_view.php");
                        exit();
                    } else {
                        header("Location: ecommerce_form.php");
                        exit();
                    }
                    exit();
                } else {
                    // Handle the case where the insertion fails
                    echo("Insert Error");
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $_SESSION['name'] = $_POST["name"];
            $_SESSION['surname'] = $_POST["surname"];
            $_SESSION['email'] = $_POST["email"];
            $_SESSION['password'] = $_POST["password"];
            $_SESSION['confirm_password'] = $_POST["confirm_password"];
            $_SESSION['address'] = $_POST["address"];
            $_SESSION['card_number'] = $_POST["card_number"];
            $_SESSION['card_date'] = $_POST["card_date"];
            $_SESSION['card_code'] = $_POST["card_code"];
            header("Location: ecommerce_form.php");
            exit();
        }
    }
}

$conn->close();
