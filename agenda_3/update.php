<?php
    include 'conn.php';

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $sql = "UPDATE contactos SET nombre='$nombre', telefono='$telefono', correo='$correo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>
