<?php
	session_start();
?>

		<div id="CasillaId">
			<p>
				<strong> Usuario: </strong> <?php echo " ".$_SESSION['usuario'] ?> <br />
				<strong> Nivel:</strong> <?php echo " ".$_SESSION['idCargo'] ?> 
			</p>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Operaciones:</h2>
		</div>
		<div id="resumenCont">
			<h4>Ultimas operaciones:</h4>
<?php
				include ("./funciones.php");
				$resumen = consulta('*','bitacora','','idTransaccion');
				$i = $resumen[1]-1;
?>
			<div id="izq">
				<?php echo 'Número de entradas en el log: '. $resumen[1] . '<br /><br />'; ?>
			</div>
			<div id="bitCol1">
				<strong> Nº: </strong><br />
				<?php echo $resumen[0][$i][0]; ?> <br />
			</div>
			<div id="bitCol2">
				<strong> Tipo: </strong><br />
				<?php echo $resumen[0][$i][1]; ?> <br />
			</div>
			<div id="bitCol3">
				<strong> Detalle: </strong><br />
				<?php echo $resumen[0][$i][2]; ?> <br />
			</div>
			<div id="bitCol4">
				<strong> IP: </strong><br />
				<?php echo $resumen[0][$i][3]; ?> <br />
			</div>
			<div id="bitCol5">
				<strong> Fecha: </strong><br />
				<?php echo $resumen[0][$i][4]; ?> <br />
			</div>		
		</div>