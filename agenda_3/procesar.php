<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

			$id = (isset($_POST["id"])) ? $_POST["id"] : '';
			$nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : '';
			$telefono = (isset($_POST["telefono"])) ? $_POST["telefono"] : '';
			$correo = (isset($_POST["correo"])) ? $_POST["correo"] : '';

			switch ($accion) {
				case 'agregar':
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
    ?>
                    <script type="text/javascript">
                        let id = <?php echo $id; ?>;
                        Swal.fire({
                            title: "Seguro de eliminar?",
                            text: "Esta acción es definitiva!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Bórralo!",
                            cancelButtonText: "Cancélalo"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type:"POST",
                                    url: "borrando.php",
                                    data:{
                                      id:id
                                    },
                                    success:function(data){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Listo !!!',
                                            text: 'Usuario Eliminado Exitosamente!'
                                        }).then(function() {
                                            window.location = "index.php";
                                        });
                                    }
                                });
                            }
                            else{
                                 window.location = "index.php";
                            }
                        });
                    </script>
    <?php
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