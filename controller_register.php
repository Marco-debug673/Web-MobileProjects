<?php
include("connection_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $last_name1 = $_POST['last_name1'];
    $last_name2 = $_POST['last_name2'];
    $username = $_POST['username'];
    $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];

    $conn = new mysqli($servername, $username_db, $password_db, "reportes");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql_persona = "INSERT INTO persona (nombre, apellido_paterno, apellido_materno, fecha_nacimiento, sexo, curp, rfc) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_persona = $conn->prepare($sql_persona);
    $stmt_persona->bind_param("sssssss", $full_name, $last_name1, $last_name2, $date, $gender, $curp, $rfc);
    
    if ($stmt_persona->execute()) {
        $persona_id = $stmt_persona->insert_id;
        
        if ($persona_id > 0) {
        $sql_usuario = "INSERT INTO usuario (id, usuario, contrasena) VALUES (?, ?, ?)";
        $stmt_usuario = $conn->prepare($sql_usuario);
        $stmt_usuario->bind_param("iss", $persona_id, $username, $password);
        
        if ($stmt_usuario->execute()) {
            echo "<script>
                    alert('Usuario creado éxitosamente');
                    window.location.href = 'index_main.php';
                </script>";
        } else {
            echo "Error al crear usuario: " . $stmt_usuario->error;
        }
        
        $stmt_usuario->close();
    } else {
        echo "Error: No se obtuvo el ID de la persona.";
    }

    } else {
        echo "Error al registrar la persona: " . $stmt_persona->error;
    }
    
    $stmt_persona->close();
    $conn->close();
}
?>