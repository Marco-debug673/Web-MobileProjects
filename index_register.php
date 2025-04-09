<?php
    include ("controller_register.php");
    include ("connection_database.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Personas</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="register-container">
        <form action="" method="post">
            <!--<label for="name">Nombre</label>-->
            <input type="text" id="name" name="full_name" required placeholder="Nombre">
            <br>
            <!--<label for="last_name1">Apellido Paterno</label>-->
            <input type="text" id="last_name1" name="last_name1" required placeholder="Apellido Paterno">
            <br>
            <!--<label for="last_name2">Apellido Materno</label>-->
            <input type="text" id="last_name2" name="last_name2" required placeholder="Apellido Materno">
            <br>
            <!--<label for="username">Usuario</label>-->
            <input type="text" id="username" name="username" required placeholder="Usuario">
            <br>
            <!--<label for="contrasena">Contraseña</label>-->
            <input type="password" id="contrasena" name="contrasena" required placeholder="Contraseña">
            <br>
            <!--<label for="date">Fecha de Nacimiento</label>-->
            <input type="date" id="date" name="date" required>
            <br>
            <!--<label for="gender">Sexo</label>-->
            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                <option selected>Seleccione una opción</option>
                <option value="1">Hombre</option>
                <option value="2">Mujer</option>
                <option value="3">Otro</option>
            </select>
            <br>
            <!--<label for="curp">Curp</label>-->
            <input type="text" id="curp" name="curp" required placeholder="Curp">
            <br>
            <!--<label for="rfc">rfc</label>-->
            <input type="text" id="rfc" name="rfc" required placeholder="RFC">

            <div class="button-container">
                <button type="button" onclick="window.history.back();">Regresar</button>
                <button type="submit" value="Registrar">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>