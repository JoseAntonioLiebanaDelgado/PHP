<?php
session_start();
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $update_query = "UPDATE users SET name = ?, surname = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssi", $name, $surname, $email, $user_id);

    $stmt->execute();
    header("Location: users_view.php");
    exit();
}
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $_SESSION['user_id'] = $user_id;

    $select_query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
} else {
    echo "Invalid user ID.";
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div style="width: 80%; margin: auto;" >
    <h1 style="margin-top: 5%;">Update User Information</h1>
    <form action="update_user.php" method="POST">
    <div style="margin-top: 2%;">
            <label for="name">Name</label>  
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
            value="<?php echo $user['name'];?>">
        </div>
        <div style="margin-top: 2%;">
            <label for="name">Surname</label> 
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname"
            value="<?php echo $user['surname'];?>">
        </div>
        <div style="margin-top: 2%;" class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="email" placeholder="your@email.com"
            value="<?php echo $user['email'];?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input style="margin-top: 2%; margin-bottom: 5%;" type="submit" name="submit" class="btn btn-primary">
    </form>

    <a href="users_view.php"><input style="margin-top: 2%; margin-bottom: 5%;" 
    type="submit" name="submit" value="Go back to User List" class="btn btn-info"></a>
</div>
</body>
</html>

