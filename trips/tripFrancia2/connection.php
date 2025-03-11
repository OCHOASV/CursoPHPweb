<?php
	include 'config.php';
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if ($connection->connect_error) {
        $connection->connect_error;
    }
?>