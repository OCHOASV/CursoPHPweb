<?php
	include 'connection.php';

	$query = "SELECT id, gasto, monto, tipo, oculto, fecha FROM francia";
    try {
        $gastos = $connection->query($query);
    } catch (Exception $e) {
        echo "<h3>Error en la Consulta!!!</h3>";
        // echo $debugger = 'Error: '.$e;
    }

    // $totalGastos = $connection->query("SELECT SUM(monto) AS total FROM francia");
    // $totalGastos = $totalGastos->fetch_assoc();
    // $totalGastos = $totalGastos['total'];

    $totalGastos = $connection->query("SELECT SUM(monto) AS total FROM francia")->fetch_assoc()['total'];

    switch (true) {
		case $totalGastos > 500:
			$alert = 'danger';
		break;

		case $totalGastos > 250:
			$alert = 'warning';
		break;

		default:
			$alert = 'success';
		break;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip por Francia Avanzado</title>
	<link rel="icon" href="france_favicon.png" type="image/png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="navbar justify-content-center text-white bg-pais">
		<h1>
			France Trip
			<img src="france.png" alt="Francia" height="40px">
		</h1>
	</div>

	<div class="container mt-3 col-md-5">
        <h2 class="text-center">Registro de Gastos</h2>
        <form action="querys.php" method="POST">
            <strong>Gasto:</strong>
            <input type="hidden" id="accion" name="accion" value="agregar">
            <input type="text" class="form-control" id="gasto" name="gasto" placeholder="Ingrese Gasto" required autofocus>
            <br>
            <strong>Monto:</strong>
            <input type="text" class="form-control" id="monto" name="monto" placeholder="Ingrese Monto" required>
            <br>
            <strong>Tipo:</strong>
            <select name="tipo" id="tipo" name="tipo" class="form-control" required>
                <option value="">Seleccione un Tipo de Gasto</option>
                <option value="compras">Compras</option>
                <option value="alcohol">Alcohol</option>
                <option value="comida">Comida</option>
                <option value="gifts">Gifts</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary active">Guardar</button>
        </form>
    </div>

    <?php
        if ($gastos->num_rows > 0) {
    ?>
            <div class="container mt-3 table-responsive">
                <table class="table table-hover text-center responsive-table">
                    <thead>
                        <tr>
                            <th class="wrap">#</th>
                            <th class="wrap">FECHA</th>
                            <th class="wrap">GASTO</th>
                            <th class="wrap">TIPO</th>
                            <th class="wrap">BASE</th>
                            <th class="wrap">IVA (21%) </th>
                            <th class="wrap">MONTO</th>
                            <th class="wrap">OCULTAR</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
                $counter = '';
                while ($row = $gastos->fetch_assoc()) {
                    $counter++;
                    $id = $row['id'];
                    $gasto = $row['gasto'];
                    $monto = $row['monto'];
                    $tipo = $row['tipo'];
                    switch ($tipo) {
                        case 'alcohol':
                            $iva = $monto * (IVA * 2);
                        break;
                        case 'comida':
                            $iva = $monto * (IVA / 2);
                        break;
                        case 'gifts':
                            $iva = $monto * (IVA /4);
                        break;
                        default:
                            $iva = $monto * IVA;
                        break;
                    }
                    $base = $monto - $iva;
                    $oculto = $row['oculto'];
                    $fecha = $row['fecha'];
    ?>
                        <tr>
                            <td class="wrap">
                            	<?php echo $counter; ?>
                            </td>
                            <?php
                                if ($oculto == 1) {
                            ?>
                                    <td colspan="6" class="text-center text-secondary">
                                        <strong>*ESTE GASTO ESTÁ OCULTO</strong>
                                    </td>
                            <?php
                                }
                                else{
                            ?>
                                    <td class="wrap">
                                        <?php echo date_format(date_create($fecha), 'd/m/Y h:i:s a'); ?>
                                    </td>
                                    <td class="wrap">
                                    	<?php echo $gasto; ?>
                                    </td>
                                    <td class="wrap">
                                        <?php echo strtoupper($tipo); ?>
                                    </td>
                                    <td>
                                    	<?php echo number_format($base, 2, '.', ',').'€' ; ?>
                                    </td>
                                    <td>
                                    	<?php echo number_format($iva, 2, '.', ',').'€' ; ?>
                                    </td>
                                    <td class="wrap">
                                    	<?php echo number_format($monto, 2, '.', ',').'€' ; ?>
                                    </td>
                            <?php
                                }
                            ?>
                            <td class="wrap">
                            	<form action="querys.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                    <?php
                                        if ($oculto == 0) {
                                    ?>
                                            <input type="hidden" id="accion" name="accion" value="ocultar">
                                            <button class="btn btn-sm btn-danger" title="OCULTAR REGISTRO">
                                            	<i class="fa-solid fa-eye-slash"></i>
                                            </button>
                                    <?php
                                        }
                                        else{
                                    ?>
                                            <input type="hidden" id="accion" name="accion" value="mostrar">
                                            <button class="btn btn-sm btn-danger" title="MOSTRAR REGISTRO">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                    <?php
                                        }
                                    ?>
                                </form>
                            </td>
                        </tr>
    <?php
                }
    ?>
                    </tbody>
                    <tr>
                    	<td colspan="6" class="text-end">
                    		<strong>TOTAL</strong>
                    	</td>
                    	<td>
                    		<div class="alert alert-<?php echo $alert; ?>" role="alert">
	                    		<strong>
	                    			<?php echo number_format($totalGastos, 2, '.', ',').'€' ; ?>
	                    		</strong>
	                    	</div>
                    	</td>
                    	<td></td>
                    </tr>
                </table>
            </div>
    <?php
        }
        else {
    ?>

            <div class="container col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Aun no tienes Gastos 😁</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">No hay Datos para mostrar...</h6>
                        <p class="card-text">Para ver los gastos del viaje, debes ingresar los montos en el formulario anterior. Recuerda divertirte al maximo en este viaje 🤩</p>
                    </div>
                </div>
            </div>
    <?php
        }
        $connection->close();
    ?>
</body>
</html>