<?php
	include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda 1</title>
</head>
<body>
    <h2>Agregar Contacto</h2>
    <form action="crear.php" method="POST">
        <label class="form-label" for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required><br>
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required><br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <?php

        $query = "SELECT * FROM contactos";
        $result = $conn->query($query);

        // print_r($result);

        if ($result->num_rows > 0) {
            // Change Table!
            echo "<table border='1'>
                    <thead class='table-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td class='wrap'>{$row['id']}</td>
                        <td class='wrap'>{$row['nombre']}</td>
                        <td class='wrap'>{$row['telefono']}</td>
                        <td class='wrap'>{$row['correo']}</td>
                        <td class='wrap'>
                            <a class='btn btn-primary btn-sm' href='editar.php?id={$row['id']}'>Editar <i class='fa-solid fa-user-pen'></i></a> |
                            <a class='btn btn-danger btn-sm' href='borrar.php?id={$row['id']}'>Eliminar <i class='fa-solid fa-user-xmark'></i></a>
                        </td>
                    </tr>";
            }
            echo "</table>

                <div>";
        } else {
            echo "No hay personas registradas.";
        }
        $conn->close();
    ?>

    <!-- <footer class="text-center text-white mt-5">
        <div class="bg-primary p-3">
            Copyright - Carlos Ochoa 2025 -
            <a class="text-white" href="#">https://ochoa.es</a>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
