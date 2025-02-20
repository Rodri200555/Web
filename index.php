<?php
require 'config1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {

        //si nombre y edad no estan vacios
        if (!empty($_POST["nombre"]) && !empty($_POST["edad"])) {
            createStudent($_POST["nombre"], $_POST["edad"]);
        } else {
            //imprimer alerta
            echo "<script>alert('Nombre y edad son requeridos');</script>";
        }
       
    } elseif (isset($_POST["update"])) {

        //si id, nombre y edad no estan vacios
        if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["edad"])) {
            updateStudent($_POST["id"], $_POST["nombre"], $_POST["edad"]);
        } else {
            //imprimer alerta
            echo "<script>alert('ID, nombre y edad son requeridos');</script>";
        }

    } elseif (isset($_POST["delete"])) {
        
        //si id no esta vacio
        if (!empty($_POST["id"])) {
            deleteStudent($_POST["id"]);
        } else {
            //imprimer alerta
            echo "<script>alert('ID es requerido');</script>";
        }
    }
}

$students = getStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Agregar alumno</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>Nombre: <input type="text" name="nombre" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Edad: <input type="number" name="edad" class="form-control"></label>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
                </form>
            </div>

            <div class="col">
                <h2>Actualizar alumno</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>ID: <input type="number" name="id" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Nombre: <input type="text" name="nombre" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Edad: <input type="number" name="edad" class="form-control"></label>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-pencil"></i> Actualizar</button>
                </form>
            </div>

            <div class="col">
                <h2>Eliminar alumno</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>ID: <input type="number" name="id" class="form-control"></label>
                    </div>
                    <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                </form>
            </div>
        </div>

        <h2>Lista de alumnos</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student["id"]; ?></td>
                    <td><?php echo $student["nombre"]; ?></td>
                    <td><?php echo $student["edad"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
