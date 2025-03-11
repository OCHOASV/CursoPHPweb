<?php
	include 'config.php';

    try {
    	$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    } catch (Exception $e) {
    	echo "<h1>Error de Conexión!!!</h1>";
    	// echo $debugger = 'Error: '.$e;
    }
?>