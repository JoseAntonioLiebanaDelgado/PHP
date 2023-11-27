
<?php
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
    // Realizar una consulta para obtener la lista de usuarios
    $query = "SELECT * FROM users";
    $users = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<table class="table" style="margin: 5%;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <th scope="row"><?php echo $user['id']; ?></th>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['surname']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="update_user.php?id=<?php echo $user['id']; ?>">
                    <input style="margin-top: 2%; margin-bottom: 5%;" 
                    type="submit" name="submit" value="Actualizar" class="btn btn-warning">
                </a>
                <a href="delete_user.php?id=<?php echo $user['id']; ?>">
                    <input style="margin-top: 2%; margin-bottom: 5%;" 
                    type="submit" name="submit" value="Eliminar" class="btn btn-danger"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="ecommerce_form.php" style="margin-left: 5%;">
                    <input style="margin-top: 2%; margin-bottom: 5%;" 
                    type="submit" name="submit" value="Back to Form" class="btn btn-info"></a>
