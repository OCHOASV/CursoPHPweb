<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplos #3</title>
	<style>
		#xxx{
			background-color: red;
		}
		.ejemplo{
			background-color: teal;
			width: 500px;
			border: 2px solid #000;
		}
		div{
			background-color: #000 !important;
		}
	</style>
</head>
<body>
	<div class="ejemplo" id="xxx" style="background-color: orange">
		&nbsp;
	</div>
	<?php
		date_default_timezone_set('Europe/Madrid');
		echo $hora_actual = date('H:i', time());
		echo '<br>';
		echo $hora_actual = date('d-m-Y H:i:s', time());
		$abre = "10:00";  #diez de la mañana
	    $cierra = "18:00";  #diez de la noche

	    if ($abre <= $hora_actual && $cierra >= $hora_actual) {
	        echo "<br><br>Abierto";
	    }
	    else {
	        echo "<br><br>Cerrado";
	    }

	    function operaciones($n1, $n2, $operacion) {
	        $resultado = 0;
	        if($operacion == "S") {
	            $resultado = $n1 + $n2;
	        }
	        else if($operacion == "R") {
	            $resultado = $n1 - $n2;
	        }
	        else if($operacion == "M") {
	            $resultado = $n1 * $n2;
	        }
	        else if($operacion == "D") {
	            $resultado = $n1 / $n2;
	        }

	        return $resultado; // *Devolver el resultado
	    }

	    // Llamar a la función operaciones
	    echo '<br><br>';
	    $r = operaciones(10, 5, "D");
	    echo $r . "<br>";
	?>

	<form action='' method='POST'>
	   Introduce un número:
	   <input type='text' name='numero'>
	   <br>
	   <input type='submit'>
	</form>
	<br>
	<?php
	    if ($_POST) {
	        $n = $_POST["numero"];
	        for ($i = 1; $i <= 10; $i++) {
	            $r = $n*$i;
	            echo $n.' x '.$i.' = '.$r.'<br>';
	            // echo "$n x $i = $r <br>";
	        }
	    }
	?>
</body>
</html>