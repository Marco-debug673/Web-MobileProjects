<?php
include("connection_database.php");

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $usuario = mysqli_real_escape_string($conn, $usuario);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashGuardado = $row['contrasena'];

        if (password_verify($contrasena, $hashGuardado)) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: index_menu.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe');</script>";
    }
}
?>