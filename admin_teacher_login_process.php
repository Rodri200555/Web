<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    // Verificar si el usuario existe
    $sql_admin = "SELECT * FROM personas WHERE usuario = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $usuario); // Se corrige el uso de la variable
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        $row_admin = $result_admin->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row_admin['password'])) {
            $_SESSION['user_role'] = 'usuario';
            $_SESSION['user_usuario'] = $usuario;

            // Redirigir a otra página (puedes cambiar "dashboard.php" por la página deseada)
            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

$conn->close();
?>

