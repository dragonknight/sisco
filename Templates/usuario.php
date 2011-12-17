<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php")
?>
	<div id="formUser">
		<form id="formIngUser" action="javascript:void(null);" onsubmit="ingUser();">
			<h3>Crear nuevo usuario</h3><br>
			<div id="userSel">
				<?php combPersonas(); ?>
			</div>
			<div id="nvaPersona" style="display:none">
<?php
				persona();
?>
				<br>
<?php
				direccion();
?>
			</div>
<?php
			usuario();
?>
			<input id="submitButton" type="submit" value="Ingresar"/>
		</form>
	</div>
	<div id="Error">
	</div>