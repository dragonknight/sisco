<?php
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function tpersona()
	{
?>
		<select id="cTipPersona" name="cTipPersona" onchange="muestraTipPersona(this)">
			<option value=""> -- Seleccione Tipo de Persona -- </option>
			<option value="1"> Persona Natural </option>
			<option value="2"> Persona no Natural </option>
		</select><br /><br />
<?php
		perNatural();
		perNoNatural();
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function perNatural()
	{
?>
		<div id="perNatural" style="display:none">
			<strong>Persona Natural</strong><br />
				<?php combPersonas(); ?>
				<div id="nvaPersona" style="display:none">
				<?php
					persona();
				?>
					<br>
				<?php
					direccion();
				?>
				</div>
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/	
	function perNoNatural()
	{
?>
		<div id="perNoNatural" style="display:none">
			<strong>Persona No Natural</strong><br />
				<?php combPersonasNoNat(); ?>
				<div id="nvaPersonaNoNat" style="display:none">
				<?php
					ente();
				?>
					<br>
				<?php
					direccion();
				?>
				</div>
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/

	function combPersonas()
	{
?>
		<select id="comboPersonas" name="comboPersonas" onchange="muestraFormPersona(this)">
			<option value=""> -- Seleccione -- </option>
			<option value="0"> -- Agregar Nueva -- </option>
			<?php combo('*','personas','','cedula'); ?>
		</select>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function combPersonasNoNat()
	{
?>
		<select id="comboPersonasNoNat" name="comboPersonasNoNat" onchange="muestraFormPersonaNoNat(this)">
			<option value=""> -- Seleccione -- </option>
			<option value="0"> -- Agregar Nueva -- </option>
			<?php combo('*','noNat','','id'); ?>
		</select>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function cEstandar()
	{
?>
		<strong>Datos de la Comunicación</strong><br /><br />
		Nº Interno para la comunicación: <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php tpersona(); ?> 
		Nº Comunicación<br /><br />
		Fecha:<br /><br />
		Sintesis:<br /><br />
		Caracter:<br /><br />
		Prioridad:<br /><br />
		Resumen:<br /><br />
		
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: gacetas
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function gaceta()
	{
?>
		<strong>Datos de la Comunicación</strong><br /><br />
		Nº Interno para la comunicación: <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php perNoNatural(); ?> <!-- Hay que cambiar el display luego de llamarlo :S -->
		Nº Comunicación<br /><br />
		Fecha:<br /><br />
		Sintesis:<br /><br />
		Caracter:<br /><br />
		Prioridad:<br /><br />
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function audiencia()
	{
?>
		<strong>Datos de la Solicitud</strong><br /><br />
		Nº Interno para la comunicación: <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php tpersona(); ?>
		Nº Comunicación (Si la Hay):<br /><br />
		Fecha:<br /><br />
		Sintesis:<br /><br />
		Caracter:<br /><br />
		Prioridad:<br /><br />
		Resumen:<br /><br />
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function invitacion()
	{
?>
		<strong>Datos de la Invitación</strong><br /><br />
		Nº Interno: <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php tpersona(); ?>
		Nº Comunicación (Si la Hay):<br /><br />
		Fecha:<br /><br />
		Sintesis:<br /><br />
		Caracter:<br /><br />
		Prioridad:<br /><br />
		Resumen (Indique aqui todos los datos de la invitación):<br /><br />
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function denuncia()
	{
?>
		<strong>Datos de la Denuncia</strong><br /><br />
		Nº Interno: <br /><br />
		Procedencia de la denuncia:<br /><br />
		<?php tpersona(); ?>
		Nº Comunicación (Si la Hay):<br /><br />
		Fecha:<br /><br />
		Sintesis:<br /><br />
		Caracter:<br /><br />
		Prioridad:<br /><br />
		Resumen (Relate aca todos los sucesos):<br /><br />
<?php
	}
?>