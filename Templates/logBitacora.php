<?php

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: bitTacoraCompleta
	Descripción: Función que consulta y muestra la bitacora completa del sistema.
	Desarrollador: Carlos Castillo
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function bitTacoraCompleta()
		{
	
			echo '
					<h4>Log General del sistema:</h4> 								
			';
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
<?php
		} 
?>