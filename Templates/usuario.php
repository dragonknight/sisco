<?php
	include ("./entidades.php");
	include ("./funciones.php");
?>
	<div id="formUser">
		<form id="formIngUser" action="javascript:void(null);" onsubmit="ingUser();">
			<h3>Crear nuevo usuario</h3><br>
			<div id="userSel">
				<select id="comboPersonas" name="comboPersonas" onchange="muestraFormPersona(this)"> <!-- hay que agregar el evento onchange="funcion()" para mostrar los datos de la persona seleccionada -->
					<option value=""> -- Seleccione -- </option>
					<option value="0"> -- Agregar Nueva -- </option>
					<?php combo('*','personas','','cedula'); ?>
				</select>
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