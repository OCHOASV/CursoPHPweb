<?php
    include 'conn.php';

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $sql = "INSERT INTO contactos (nombre, telefono, correo) VALUES ('$nombre', '$telefono', '$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "Persona agregada exitosamente.";
        // Redirect !!!
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>