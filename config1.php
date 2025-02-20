<?php
$mysqli = new mysqli('localhost', 'root', '', 'crud');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Create
function createStudent($nombre, $edad) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO alumnos (nombre, edad) VALUES (?, ?)");
    $stmt->bind_param("si", $nombre, $edad);
    $stmt->execute();
    $stmt->close();
}

// Read
function getStudents() {
    global $mysqli;
    $result = $mysqli->query("SELECT id, nombre, edad FROM alumnos");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getStudent($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT id, nombre, edad FROM alumnos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Update
function updateStudent($id, $nombre, $edad) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE alumnos SET nombre = ?, edad = ? WHERE id = ?");
    $stmt->bind_param("sii", $nombre, $edad, $id);
    $stmt->execute();
    $stmt->close();
}

// Delete
function deleteStudent($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM alumnos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
