<?php
    include ("controller_finance.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales</title>
    <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <div class="material-container">
        <form action="" method="post">
            <h1>Registro de Materiales</h1>
            <br>
            <label for="nombre">Nombre del material:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="floatingTextarea">Descripción del material:</label>
            <textarea class="form-control" placeholder="Descripción del daño..." id="floatingTextarea" name="descripcion"></textarea>
            <br>
            <label for="formFile" class="form-label">Cantidad</label>
            <input class="form-control" type="number" id="formFile" name="evidencia">
            <br>
            <div class="button-container">
                <button type="button" onclick="window.history.back();">Regresar</button>
                <button type="submit" id="guardar" name="guardar">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>