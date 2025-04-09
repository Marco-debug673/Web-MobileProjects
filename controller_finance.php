<?php
include ("connection_database.php");

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['evidencia'];

    $sql = "INSERT INTO material (nombre, descripcion, cantidad) 
            VALUES ('$nombre', '$descripcion', '$cantidad')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Nuevo material registrado exitosamente');
                window.location.href = 'index_finance.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>