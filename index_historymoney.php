<?php
include("connection_database.php");

$conn->set_charset("utf8mb4");

$sql = "SELECT id_daño, id_categoria_daño, id_edificio, descripcion FROM daño";
$sql2 = "SELECT id_evidencia, nombre, url FROM evidencia";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>
<?php
if (isset($_POST['eliminar']) && !empty($_POST['eliminar_ids'])) {
    $ids = $_POST['eliminar_ids'];

    $ids_para_eliminar = implode(",", array_map('intval', $ids));
    
    $sql_delete = "DELETE FROM daño WHERE id_daño IN ($ids_para_eliminar)";
    if ($conn->query($sql_delete) === TRUE) {
        header("Location: ".$_SERVER['PHP_SELF']."?eliminado=1");
        exit;
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>
<?php
if (isset($_POST['eliminar_evidencias']) && !empty($_POST['eliminar_ids_evidencia'])) {
    $ids_evidencia = $_POST['eliminar_ids_evidencia'];
    $ids_para_eliminar_evidencia = implode(",", array_map('intval', $ids_evidencia));
    
    $sql_delete_evidencia = "DELETE FROM evidencia WHERE id_evidencia IN ($ids_para_eliminar_evidencia)";
    if ($conn->query($sql_delete_evidencia) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?eliminado_evidencia=1");
        exit;
    } else {
        echo "Error al eliminar evidencia: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daños</title>
    <link rel="stylesheet" href="css/style7.css">
</head>
<script>
function confirmarEliminacionEvidencias() {
    return confirm("¿Estás seguro de que deseas eliminar la evidencia seleccionada?");
}
</script>
<body>
    <div class="container">
        <h1>Daños</h1>
        <?php if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1): ?>
            <div class="mensaje-exito">¡Eliminación éxitosa!</div>
        <?php endif; ?>
        <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th>id_daño</th>
                    <th>id_categoria_daño</th>
                    <th>id_edificio</th>
                    <th>Descripcion</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='id_daño'>" . $row["id_daño"] . "</td>";
                        echo "<td data-label='id_categoria_daño'>" . htmlspecialchars($row["id_categoria_daño"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='id_edificio'>" . htmlspecialchars($row["id_edificio"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='descripcion'>" . (isset($row["descripcion"]) ? htmlspecialchars($row["descripcion"], ENT_QUOTES, 'UTF-8') : "No disponible") . "</td>";
                        echo '<td data-label="seleccionar" style="text-align: center;">
                            <input type="checkbox" name="eliminar_ids[]" value="' . $row["id_daño"] . '">
                            </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='text-align: center;'>No hay registros de daños</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div>
            <button class="btn-eliminar" type="submit" name="eliminar">
                Eliminar</button>
        </div>
        </form>
        <br>
        <?php if (isset($_GET['eliminado_evidencia']) && $_GET['eliminado_evidencia'] == 1): ?>
            <div class="mensaje-exito">¡Evidencia eliminada correctamente!</div>
        <?php endif; ?>
        <form method="POST" action="">
        <table>
        <thead>
                <tr>
                    <th>id_evidencia</th>
                    <th>Nombre</th>
                    <th>Evidencia</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='id_evidencia'>" . $row2["id_evidencia"] . "</td>";
                        echo "<td data-label='nombre'>" . htmlspecialchars($row2["nombre"], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td data-label='url'>";
                        $archivo = htmlspecialchars($row2["url"], ENT_QUOTES, 'UTF-8');
                        $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                        $ext_img = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                        $ext_document = ['pdf', 'docx', 'pptx', 'xlsx'];
                        
                        if (in_array($extension, $ext_img)) {
                            echo "<img src='" . $archivo . "' alt='Evidencia' style='max-width: 100%; height: 300px; border: 1px solid #ccc; margin-bottom: 10px;'>";
                        } elseif ($extension === 'pdf') {
                            echo "<iframe src='" . $archivo . "' style='width: 100%; height: 300px; border: none;'></iframe>";
                        } elseif (in_array($extension, $ext_document)) {
                            echo "<p>Archivo de tipo <strong>." . $extension . "</strong>: <a href='" . $archivo . "' download>Descargar archivo</a></p>";
                        } else {
                            echo "<p>Tipo de archivo no soportado para visualización. <a href='" . $archivo . "' download>Descargar</a></p>";
                        }                       
                        echo "</td>";
                        echo '<td data-label="seleccionar" style="text-align: center;">
                            <input type="checkbox" name="eliminar_ids_evidencia[]" value="' . $row2["id_evidencia"] . '">
                            </td>';
                        echo "</tr>";
                    }
                }
                else {
                    echo "<tr><td colspan='4' style='text-align: center;'>No hay registros de evidencia</td></tr>";
                }                
        ?>
            </tbody>
        </table>
        <div class="botones-acciones">
            <button class="btn-eliminar" type="submit" name="eliminar_evidencias" 
            onclick="return confirmarEliminacionEvidencias()">Eliminar</button>
            <a href="index_menu.php" class="btn-regresar">Regresar</a>
        </div>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>