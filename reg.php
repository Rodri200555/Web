<?php
$conexion = new mysqli("localhost", "root", "", "crud");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Definir usuario y contraseña
$usuario = "RodrigoH";
$password = "123456"; // Contraseña en texto plano

// Hashear la contraseña antes de guardarla en la base de datos
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la base de datos
$sql = "INSERT INTO personas (usuario, password) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $password_hashed);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
