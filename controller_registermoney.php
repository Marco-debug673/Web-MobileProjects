<?php
include("connection_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['damage'];
    $edificio = $_POST['edificio'];
    $descripcion = $_POST['descripcion'];

    $evidencia_nombre = $_FILES['evidencias']['name'];
    $evidencia_tmp = $_FILES['evidencias']['tmp_name'];
    $evidencia_ruta = "evidencias/" . basename($evidencia_nombre);

    if (!is_dir("evidencias")) {
        mkdir("evidencias", 0777, true);
    }

    if (move_uploaded_file($evidencia_tmp, $evidencia_ruta)) {

        $sql_dano = "INSERT INTO daño (id_categoria_daño, id_edificio, descripcion) VALUES (?, ?, ?)";
        $stmt_dano = $conn->prepare($sql_dano);
        $stmt_dano->bind_param("iis", $categoria, $edificio, $descripcion);
        $stmt_dano->execute();

        $id_nombre = $stmt_dano->insert_id;
        
        $sql_evidencia = "INSERT INTO evidencia (id_daño, nombre, url) VALUES (?, ?, ?)";
        $stmt_evidencia = $conn->prepare($sql_evidencia);
        $stmt_evidencia->bind_param("iss", $id_nombre, $evidencia_nombre, $evidencia_ruta);
        $stmt_evidencia->execute();
        
        echo "<script>alert('Datos guardados correctamente');</script>";
    } else {
        echo "<script>alert('Error al subir la evidencia');</script>";
    }
}
?>