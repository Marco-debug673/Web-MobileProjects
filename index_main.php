<?php
    include ("connection_database.php");
    include ("controller_index_main.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <form action="" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena">

            <button type="submit" name="login">Entrar</button>
            <br><br>
            <p style="text-align: center";>¿No tienes una cuenta? <a href="index_register.php">Crear Cuenta</a></p>
        </form>
    </div>
</body>
</html>