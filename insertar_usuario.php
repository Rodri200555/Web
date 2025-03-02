<?php
require_once 'conexion.php';

// Contraseña encriptada
$password = password_hash("miContraseña", PASSWORD_DEFAULT);

// Preparar la consulta para insertar el usuario
$username = 'nuevo_usuario';
$stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Usuario insertado correctamente.";
} else {
    echo "Error al insertar el usuario: " . $stmt->error;
}
?>
