<?php
    include("connection_database.php");
    include("controller_registermoney.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Daños</title>
    <link rel="stylesheet" href="css/style4.css">
</head>
<body>
    <div class="registerdamaged-container">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $sql = "select id_categoria_daño, nombre from categoria_daño";
                $resultado = $conn->query($sql);
            ?>
            <label for="name">Categoría del daño:</label>
            <select class="form-select" aria-label="Default select example" id="damage" name="damage">
                <option selected>Seleccione una opción</option>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <option value="<?php echo $fila['id_categoria_daño']; ?>"><?php echo $fila['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="formFile" class="form-label">Evidencia</label>
            <input class="form-control" type="file" id="formFile" name="evidencias">
            <br>
            <?php
                $sql_edificio = "select id_edificio, nombre from edificio";
                $resultado_edificio = $conn->query($sql_edificio);
            ?>
            <label for="edificio">Edificio:</label>
            <select class="form-select" aria-label="Default select example" id="edificio" name="edificio">
                <option selected>Seleccione una opción</option>
                <?php while($edificio = $resultado_edificio->fetch_assoc()): ?>
                    <option value="<?php echo $edificio['id_edificio']; ?>"><?php echo $edificio['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="floatingTextarea">Descripción del daño:</label>
            <textarea class="form-control" placeholder="Descripción del daño..." id="floatingTextarea" name="descripcion"></textarea>
            <br>
            <div class="button-container">
                <button type="button" onclick="window.history.back();">Regresar</button>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>