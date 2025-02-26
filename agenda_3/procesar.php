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
				include 'conn.php';
				if ($conn->query($sql) === TRUE) {
			        return 'ok';
			    } else {
			        echo "Error: " . $conn->error;
			    }
			    $conn->close();
			}

			switch ($accion) {
				case 'agregar':
					$nombre = $_POST["nombre"];
				    $telefono = $_POST["telefono"];
				    $correo = $_POST["correo"];
				    $sql = "INSERT INTO contactos (nombre, telefono, correo) VALUES ('$nombre', '$telefono', '$correo')";
				    if (ejecutar_query($sql) == 'ok') {
	?>
				    	<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Listo !!!',
                                text: '<?php echo $nombre ?> Agregado Exitosamente!'
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
	<?php
				    }
					break;

				case 'editar':
				    $id = $_POST["id"];
				    $nombre = $_POST["nombre"];
				    $telefono = $_POST["telefono"];
				    $correo = $_POST["correo"];
				    $sql = "UPDATE contactos SET nombre='$nombre', telefono='$telefono', correo='$correo' WHERE id=$id";
				    if (ejecutar_query($sql) == 'ok') {
	?>
				    	<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Listo !!!',
                                text: '<?php echo $nombre ?> Editado Exitosamente!'
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
	<?php
				    }
					break;

				case 'borrar':
					$id = $_POST["id"];
				    $sql = "DELETE FROM contactos WHERE id=$id";
					if (ejecutar_query($sql) == 'ok') {
	?>
						<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Listo !!!',
                                text: 'Usuario Eliminado Exitosamente!'
                            }).then(function() {
                                window.location = "index.php";
                            });
                        </script>
	<?php
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
					text: "No tienes Permuiso!"
				}).then(function() {
                    window.location = "index.php";
                });
			</script>
	<?php
		}
	?>
</body>
</html>