<?php

session_start();

/*if (isset($_SESSION['id'])) {
    header('Location: ManageUsers.php');
}*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro - Ecommerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Formulario de Registro</div>
                <div class="card-body">
                    <form action="ProcessRegistration.php" method="POST" id="registrationForm">

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required pattern="[a-zA-Z\s]+">
                            <small class="form-text text-danger">* Solo letras</small>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" required pattern="[a-zA-Z\s]+">
                            <small class="form-text text-danger">* Solo letras</small>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <small class="form-text text-danger">* Formato de email incorrecto</small>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" name="password" class="form-control" required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}">
                            <small class="form-text text-danger">* Debe contener al menos 1 mayúscula, 1 minúscula, 1 número y 5 caracteres</small>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirmación de la contraseña:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            <small class="form-text text-danger">* Las contraseñas deben coincidir</small>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección de envío:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="tarjeta">Número de tarjeta:</label>
                            <input type="text" id="tarjeta" name="tarjeta" class="form-control" pattern="\d{16}">
                            <small class="form-text text-danger">* 16 dígitos</small>
                        </div>

                        <div class="form-group">
                            <label for="fecha_caducidad">Fecha de caducidad:</label>
                            <input type="date" id="fecha_caducidad" name="fecha_caducidad" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="codigo_seguridad">Código de seguridad:</label>
                            <input type="text" id="codigo_seguridad" name="codigo_seguridad" class="form-control" pattern="\d{3}">
                            <small class="form-text text-danger">* 3 dígitos</small>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Registrarse" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
