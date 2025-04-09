<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "reportes";

$conn = new mysqli($servername, $username_db, $password_db, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn -> set_charset("utf8mb4");
?>