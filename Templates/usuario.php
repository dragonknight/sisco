<?php
	include ("./entidades.php");
?>
	<div id="formUser">
	<h3>Crear nuevo usuario</h3><br>
	<h4>Datos de la Persona:</h4><br>
<?php
	persona();
?>
	<br>
	<h4>Datos de Vivienda:</h4><br>
<?php
	direccion();
?>
	<br>
	<h4>Datos del Usuario:</h4><br>
<?php
	usuario();
?>
	</div>