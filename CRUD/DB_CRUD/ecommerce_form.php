<?php
session_start();

// Initialize variables to hold user data
$name = $surname = $email = $password = $confirm_password = $address = $card_number = $card_date = $card_code = "";

// Check if there are error messages in the session
$name_error = $_SESSION['name_error'] ?? "";
$surname_error = $_SESSION['surname_error'] ?? "";
$email_error = $_SESSION['email_error'] ?? "";
$password_error = $_SESSION['password_error'] ?? "";
$confirm_password_error = $_SESSION['confirm_password_error'] ?? "";
$address_error = $_SESSION['address_error'] ?? "";
$card_number_error = $_SESSION['card_number_error'] ?? "";
$card_date_error = $_SESSION['card_date_error'] ?? "";
$card_code_error = $_SESSION['card_code_error'] ?? "";

// Pre-fill the form fields with the user's input data
$name = $_SESSION['name'] ?? "aaa";
$surname = $_SESSION['surname'] ?? $surname;
$email = $_SESSION['email'] ?? $email;
$address = $_SESSION['address'] ?? $address;
$card_number = $_SESSION['card_number'] ?? $card_number;
$card_date = $_SESSION['card_date'] ?? $card_date;
$card_code = $_SESSION['card_code'] ?? $card_code;

// Clear the session variables holding error messages
unset($_SESSION['name_error']);
unset($_SESSION['surname_error']);
unset($_SESSION['email_error']);
unset($_SESSION['password_error']);
unset($_SESSION['confirm_password_error']);
unset($_SESSION['address_error']);
unset($_SESSION['card_number_error']);
unset($_SESSION['card_date_error']);
unset($_SESSION['card_code_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div style="width: 80%; margin: auto;" >
    <h1 style="margin-top: 5%;">Login</h1>
    <form method="post" autocomplete="off" action="ddbb_manager.php">  
        <div style="margin-top: 2%;">
            <label for="name">Name</label>  
            <span class="error" style="color: red;">* <?php echo $name_error;?></span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
            value="<?php echo $name;?>">
        </div>
        <div style="margin-top: 2%;">
            <label for="name">Surname</label> 
            <span class="error" style="color: red;">* <?php echo $surname_error;?></span>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname"
            value="<?php echo $surname;?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <span class="error" style="color: red;">* <?php echo $email_error;?></span>
            <input type="text" class="form-control" name="email" placeholder="your@email.com"
            value="<?php echo $email;?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="password">Password</label>
            <span class="error" style="color: red;">* <?php echo $password_error;?></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
            value="<?php echo $password;?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="repass">Repeat Password</label>
            <span class="error" style="color: red;">* <?php echo $confirm_password_error;?></span>
            <input type="password" class="form-control" id="repass" name="confirm_password" placeholder="Password"
            value="<?php echo $confirm_password;?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="address">Address</label>
            <span class="error" style="color: red;"><?php echo $address_error;?></span>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address"
            value="<?php echo $address;?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="card_num">Card Number</label>
            <span class="error" style="color: red;"><?php echo $card_number_error;?></span>
            <input type="text" class="form-control" id="card_num" name="card_number" placeholder="XXXX-XXXX-XXXX-XXXX"
            value="<?php echo $card_number;?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="card_date">Card Date</label>
            <span class="error" style="color: red;"><?php echo $card_date_error;?></span>       
            <input type="date" class="form-control" id="card_date" name="card_date"
            value="<?php echo $card_date;?>">   
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="card_code">Security Code</label>
            <span class="error" style="color: red;"><?php echo $card_code_error;?></span>       
            <input type="text" class="form-control" id="card_code" name="card_code" placeholder="XXX"
            value="<?php echo $card_code;?>">
        </div>
        <input style="margin-top: 2%; margin-bottom: 5%;" type="submit" name="submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>