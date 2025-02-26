<?php
    include 'conn.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM contactos WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar a <?php echo $row['nombre']; ?></title>
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
        <h2 class="text-center">Editar a <?php echo $row['nombre']; ?></h2>
        <form action="procesar.php" method="POST">
            <label class="form-label" for="nombre">Nombre:</label>
            <input type="hidden" id="accion" name="accion" value="editar">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php echo $row['correo']; ?>" required><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- <footer class="text-center text-white mt-5">
        <div class="bg-primary p-3">
            Copyright - Carlos Ochoa 2025 -
            <a class="text-white" href="#">https://ochoa.es</a>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
