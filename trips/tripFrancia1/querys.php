<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<?php
		if ($_POST) {
			$accion = $_POST['accion'];

			function ejecutar_query($sql){
				include 'connection.php';
				if ($connection->query($sql) === TRUE) {
			        return 'ok';
			    } else {
			        echo "Error: " . $connection->error;
			    }
			    $connection->close();
			}

			$gasto = (isset($_POST["gasto"])) ? $_POST["gasto"] : '';
			$monto = (isset($_POST["monto"])) ? $_POST["monto"] : '';

			switch ($accion) {
				case 'agregar':
				    $sql = "INSERT INTO francia VALUES ('', '$gasto', '$monto', 'basico', '', now() ) ";
				    if (ejecutar_query($sql) == 'ok') {
						header('location: index.php');
				    }
				break;
			}
		}
		else{
	?>
			<script type="text/javascript">
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "No tienes Permiso para ver esto!"
				}).then(function() {
                    window.location = "index.php";
                });
			</script>
	<?php
		}
	?>
</body>
</html>