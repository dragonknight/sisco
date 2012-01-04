<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php");
?>
<div id="formUser">
	<h3>Registrar Comunicación Entrante</h3><br>
	<div id="audiencia">
		<strong>Solicitud de Audiencia</strong>
		<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
			<?php
				audiencia();
			?>
			<input id="submitButton" type="submit" value="Ingresar"/>
		</form>
		<div id="Error">
		</div>
	</div>
</div>