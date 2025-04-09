<?php
include ("connection_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_pago = $_POST['nombre'];
    $tipo_pago = $_POST['tipo'];
    $fecha = $_POST['fecha'];

    $stmt = $conn->prepare("INSERT INTO pagos_importantes (nombre_pago, tipo_pago, fecha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre_pago, $tipo_pago, $fecha);

    if ($stmt->execute()) {
        echo "Los datos se han guardado éxitosamente";
    } else {
        echo "Error al guardar los datos" . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>