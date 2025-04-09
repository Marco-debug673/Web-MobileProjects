<?php
    include("controller_registerpayment.php");
    include("connection_database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register of payment by yourself</title>
    <link rel="stylesheet" href="css/style5.css">
</head>
<body>
    <div class="registerpayment-container">
        <form action="" method="post">
            <label for="name">Nombre del Pago:</label>
            <input type="name" id="name" name="name fo the payment" required>
            <h1>Selecciona el pago:</h1>
            <select class="form-select"  id="options">
                <option selected>Seleccione una opción</option>
                <option value="1">Luz</option>
                <option value="2">Agua</option>
                <option value="3">Predial</option>
                <option value="4">Internet</option>
                <option value="5">Comida</option>
                <option value="6">Postre</option>
                <option value="7">Otros</option>
            </select>
            <label for="date">Fecha del Pago</label>
            <input type="date" id="date" name="date of the payment" required>

            <div class="button-container">
                <button type="button" onclick="window.history.back();">Regresar</button>
                <button type="submit" value="Registrar">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>