<?php
    include 'conn.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM contactos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>
