<?php
    include 'conn.php';

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $sql = "INSERT INTO contactos (nombre, telefono, correo) VALUES ('$nombre', '$telefono', '$correo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        // echo "Exito!";
        // echo "<br><a href='index.php'>Ir al Home</a>";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>