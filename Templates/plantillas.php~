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
				<?php combPersonas(); // llamo a la función local que arma el combo con las personas ?> 
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
			<?php comboPersonas('*','personas','','cedula'); ?>
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
	función: combPrioridad
	Descripción: Funcion que Muestra el Combo de las Prioridades
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function combPrioridad()
	{
?>
		<select id="Prioridad" name="Prioridad">
			<option value=""> -- Seleccione -- </option>
			<option value="1"> Alto </option>	
			<option value="2"> Medio </option>
			<option value="3"> Bajo </option>
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
	function caracterCom()
	{
?>
		<select id="Caracter" name="Caracter">
			<option value=""> -- Seleccione -- </option>
			<?php combo('*','caracterCom','','id'); ?>
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
		$comunicacion = cuenta_reg("comunicaciones","numInterno","tCom = '1'");
		$comunicacion = $comunicacion[0]+1;
?>
		<strong>Datos de la Comunicación</strong><br /><br />
		Tipo Comunicación: <input name="tipCom" type="text" id="tipCom" value="Estandar" size"5"> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-E-E-2012-' .$comunicacion.'" size"5"> '; ?> <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php tpersona(); ?>
		<div id="rCol1">
			Nº Comunicación<br />
		</div>
		<div id="rCol2">
			<input type="text" name="NumCom" id="NumCom" value="" size="20" /><br />
		</div>
		<div id="rCol3">
			Fecha:<br />
		</div>
		<div id="rCol4">
			<!-- Mostramos un combos para la seleccion de fechas -->
			<!-- Concatenamos la fecha en un campo oculto -->		
			<input type="text" name="Fecha" id="Fecha" value="" size="20" /><br />
		</div>
		<div id="rCol1">
			Sintesis:<br />
		</div>
		<div id="rCol2">
			<input type="text" name="Sintesis" id="Sintesis" value="" size="20" /><br />
		</div>
		<div id="rCol3">
			Caracter:<br />
		</div>
		<div id="rCol4">
			<!-- Combo Caracter -->
			<?php caracterCom(); ?>
		</div>
		<div id="rCol1">
			Prioridad:<br />
		</div>
		<div id="rCol2">
			<!-- Combo Prioridades -->
			<?php combPrioridad(); ?>
		</div><br />
		<div id="rCol3">
			Resumen:<br />
		</div>
		<div id="rCol4">
			<input type="text" name="Resumen" id="Resumen" value="" size="20" /><br />
		</div>
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
		Tipo Comunicación: <input name="tipCom" type="text" id="tipCom" value="Gaceta" size"5"> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-E-G-2012-' .$comunicacion.'" size"5"> '; ?> <br /><br />
		<?php perNoNatural(); ?>
		<div id="usrCol1">
			Nº Comunicación<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="NumCom" id="NumCom" value="" size="20" /><br />
		</div>
		<div id="usrCol3">
			Fecha:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Mostramos un combos para la seleccion de fechas -->
			<!-- Concatenamos la fecha en un campo oculto -->		
			<input type="text" name="Fecha" id="Fecha" value="" size="20" />
		</div>
		<div id="usrCol1">
			Sintesis:<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="" id="" value="" size="20" /><br />
		</div>
		<div id="usrCol3">
			Caracter:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Combo Caracter -->
			<?php caracterCom(); ?><br />
		</div>
		<div id="usrCol1">
			Prioridad:<br /><br />
		</div>
		<div id="usrCol2">
			<!-- Combo Prioridades -->
			<?php combPrioridad(); ?>
		</div>
		<div id="usrCol3">
		</div>
		<div id="usrCol4">
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: audiencia
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
		Tipo Comunicación: <input name="tipCom" type="text" id="tipCom" value="Audiencia" size"5"> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-E-A-2012-' .$comunicacion.'" size"5"> '; ?> <br /><br />
		<?php tpersona(); ?>
		<div id="usrCol1">
			Nº Comunicación (Si la hay)<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="NumCom" id="" value="NumCom" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Fecha:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Mostramos un combos para la seleccion de fechas -->
			<!-- Concatenamos la fecha en un campo oculto -->		
			<input type="text" name="Fecha" id="Fecha" value="" size="20" />
		</div>
		<br />
		<div id="usrCol1">
			Sintesis:<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="Sintesis" id="Sintesis" value="" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Caracter:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Combo Caracter -->
			<?php caracterCom(); ?>
		</div>
		<div id="usrCol1">
			Prioridad:<br /><br />
		</div>
		<div id="usrCol2">
			<!-- Combo Prioridades -->
			<?php combPrioridad(); ?>
		</div>
		<div id="usrCol3">
			Resumen:<br /><br />
		</div>
		<div id="usrCol4">
			<input type="text" name="Resumen" id="Resumen" value="" size="20" /> <br />
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: invitacion
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
		Tipo Comunicación: <input name="tipCom" type="text" id="tipCom" value="Invitacion" size"5"> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-E-I-2012-' .$comunicacion.'" size"5"> '; ?> <br /><br />
		Procedencia de la comunicación:<br /><br />
		<?php tpersona(); ?>
				<div id="usrCol1">
			Nº Comunicación<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="NumCom" id="NumCom" value="" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Fecha:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Mostramos un combos para la seleccion de fechas -->
			<!-- Concatenamos la fecha en un campo oculto -->		
			<input type="text" name="Fecha" id="Fecha" value="" size="20" />
		</div>
		<div id="usrCol1">
			Sintesis:<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="Sintesis" id="Sintesis" value="" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Caracter:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Combo Caracter -->
			<?php caracterCom(); ?>
		</div>
		<div id="usrCol1">
			Prioridad:<br /><br />
		</div>
		<div id="usrCol2">
			<!-- Combo Prioridades -->
			<?php combPrioridad(); ?>
		</div>
		<div id="usrCol3">
			Resumen: (Indique aqui todos los datos de la Invitación)<br /><br />
		</div>
		<div id="usrCol4">
			<input type="text" name="Resumen" id="Resumen" value="" size="20" /> <br />
		</div>
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
		Tipo Comunicación: <input name="tipCom" type="text" id="tipCom" value="Denuncia" size"5"> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-E-D-2012-' .$comunicacion.'" size"5"> '; ?> <br /><br />
		Procedencia de la denuncia:<br /><br />
		<?php tpersona(); ?>
		<div id="usrCol1">
			Nº Comunicación (Si la hay)<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="NumCom" id="NumCom" value="" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Fecha:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Mostramos un combos para la seleccion de fechas -->
			<!-- Concatenamos la fecha en un campo oculto -->		
			<input type="text" name="Fecha" id="Fecha" value="" size="20" />
		</div>
		<div id="usrCol1">
			Sintesis:<br /><br />
		</div>
		<div id="usrCol2">
			<input type="text" name="Sintesis" id="" value="Sintesis" size="20" /> <br />
		</div>
		<div id="usrCol3">
			Caracter:<br /><br />
		</div>
		<div id="usrCol4">
			<!-- Combo Caracter -->
			<?php caracterCom(); ?>
		</div>
		<div id="usrCol1">
			Prioridad:<br /><br />
		</div>
		<div id="usrCol2">
			<!-- Combo Prioridades -->
			<?php combPrioridad(); ?>
		</div>
		<div id="usrCol3">
			Resumen: (Relate aca todos los echos)<br /><br />
		</div>
		<div id="usrCol4">
			<input type="text" name="Resumen" id="Resumen" value="" size="20" /> <br />
		</div>
<?php
	}
?>