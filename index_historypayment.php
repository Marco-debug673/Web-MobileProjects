<?php
include("connection_database.php");

$conn->set_charset("utf8mb4");

$sql = "SELECT nombre, descripcion, cantidad FROM material";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Materiales</title>
    <link rel="stylesheet" href="css/style7.css">
</head>
<body>
    <div class="container">
        <h1>Materiales</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='nombre'>" . $row["nombre"] . "</td>";
                        echo "<td data-label='descripcion'>" . (isset($row["descripcion"]) ? $row["descripcion"] : "No disponible") . "</td>";
                        echo "<td data-label='cantidad'>" . $row["cantidad"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay registros de materiales</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="button-container">
            <button type="button" onclick="window.history.back();">Regresar</button>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>