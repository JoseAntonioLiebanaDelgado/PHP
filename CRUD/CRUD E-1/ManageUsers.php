<?php
require_once 'Database.php';
session_start();

/*if (!isset($_SESSION['id'])) {
    header('Location: Register.php');
    exit();
}*/

$db = bd\Database::getInstance();
$connection = $db->getConnection();

$query = "SELECT * FROM usuarios";
$result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Usuarios</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($user = $result->fetch_assoc()) :?>
            <tr>
                <td><?= $user['nombre'] ?></td>
                <td><?= $user['apellidos'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a href="EditUser.php?id=<?= $user['id'] ?>" class="btn btn-warning">Editar</a>
                    <form action="DeleteUser.php" method="post" style="display:inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
