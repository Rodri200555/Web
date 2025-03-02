<?php
$host = "localhost";  // o tu host
$user = "root";       // tu usuario de MySQL
$pass = "";           // tu contraseña de MySQL
$dbname = "crud";     // nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
