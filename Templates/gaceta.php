<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php");
?>
<div id="formUser">
	<h3>Registrar Comunicación Entrante</h3><br>
	<div id="audiencia">
		<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
			<?php
				audiencia();
			?>
			<br />
			<input id="submitButton" type="submit" value="Ingresar"/>
		</form>
		<div id="Error">
		</div>
	</div>
</div>