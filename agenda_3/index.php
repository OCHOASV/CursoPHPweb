<?php
	include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda 3</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .wrap{
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                OCHOA <i class="fa-brands fa-php fa-xl"></i>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <span>
                    <button class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-user"></i> Login</button>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-3 col-md-3">
        <h2 class="text-center">Agregar Contacto</h2>
        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">Nombre:</label>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required><br>
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <?php

        $query = "SELECT * FROM contactos";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
    ?>
            <div class="container mt-3 table-responsive">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>TELÉFONO</th>
                            <th>CORREO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
                while ($row = $result->fetch_assoc()) {
    ?>
                        <tr>
                            <td class="wrap"><?php echo $row['id']; ?></td>
                            <td class="wrap"><?php echo $row['nombre']; ?></td>
                            <td class="wrap"><?php echo $row['telefono']; ?></td>
                            <td class="wrap"><?php echo $row['correo']; ?></td>
                            <td class="wrap">
                                <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar <i class='fa-solid fa-user-pen'></i></a>

                                <form action="procesar.php" method="POST">
                                    <input type="hidden" id="accion" name="accion" value="borrar">
                                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                                    <button class="btn btn-sm btn-danger">Eliminar <i class='fa-solid fa-user-xmark'></i></button>
                                </form>
                            </td>
                        </tr>
    <?php
                }
    ?>
                    </tbody>
                </table>
            </div>
    <?php
        }
        else {
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
