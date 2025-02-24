<?php
	// conexion
	include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h2>Agregar Contacto</h2>
    <form action="crear.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" placeholder="Telefono" required><br>
        <label for="email">Email:</label>
        <input type="email" id="correo" name="correo" placeholder="Correo" required><br>
        <button type="submit">Guardar</button>
    </form>

    <?php

        $query = "SELECT * FROM contactos";
        $result = $conn->query($query);

        // print_r($result);

        if ($result->num_rows > 0) {
            // Change Table!
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['telefono']}</td>
                        <td>{$row['correo']}</td>
                        <td>
                            <a href='editar.php?id={$row['id']}'>Editar</a> |
                            <a href='borrar.php?id={$row['id']}'>Eliminar</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay personas registradas.";
        }
        $conn->close();
    ?>
</body>
</html>
