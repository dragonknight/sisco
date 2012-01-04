<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php");
?>
<div id="formUser">
	<h3>Registrar Comunicación Entrante</h3><br>
	<div id="cEstandar">
		<strong>Comunicación Estandar</strong>
		<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
			<?php
				cEstandar();
			?>
		</form>
		<div id="Error">
		</div>
	</div>
</div>