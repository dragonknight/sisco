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
			<h4>Comunicaciones Recibidas:</h4><br />
<?php
				include ("./funciones.php");
				$resumen = consulta('*','bitacora','','idTransaccion');
				$i = $resumen[1]-1;
?>
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $resumen[1]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php echo $resumen[0][$i][1]; ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php echo $resumen[0][$i][2]; ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $resumen[0][$i][3]; ?>
			</div>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Trabajo:</h2>
		</div>
		<div id="resumenCont">
			<h4>Comunicaciones Asignadas:</h4><br />
		</div>