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

				try {
					$result = $connection->query($sql);
					if ($result === TRUE) {
				        return 'ok';
				    }
				    $connection->close();
				} catch (Exception $e) {
					echo "<h3>Error en la Consulta!!!</h3>";
        			// echo $debugger = 'Error: '.$e;
				}

			}

			$id = (isset($_POST["id"])) ? $_POST["id"] : '';
			$gasto = (isset($_POST["gasto"])) ? $_POST["gasto"] : '';
			$monto = (isset($_POST["monto"])) ? $_POST["monto"] : '';
			$tipo = (isset($_POST["tipo"])) ? $_POST["tipo"] : '';

			switch ($accion) {
				case 'agregar':
				    $sql = "INSERT INTO francia VALUES ('', '$gasto', '$monto', '$tipo', '', now() ) ";
				    if (ejecutar_query($sql) == 'ok') {
	?>
						<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Listo !!!',
                                text: '<?php echo $gasto ?> agregado exitosamente!'
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
	<?php
				    }
				break;

				case 'ocultar':
				    $sql = "UPDATE francia SET oculto = 1 WHERE id = $id ";
				    if (ejecutar_query($sql) == 'ok') {
				    	header('Location: index.php');
				    }
				break;

				case 'mostrar':
				    $sql = "UPDATE francia SET oculto = 0 WHERE id = $id ";
				    if (ejecutar_query($sql) == 'ok') {
				    	header('Location: index.php');
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