<?php
	include 'conn.php';
	$id = $_POST["id"];

	$sql = "DELETE FROM contactos WHERE id = '$id' ";

	if ($conn->query($sql) === TRUE) {
        return 'ok';
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>