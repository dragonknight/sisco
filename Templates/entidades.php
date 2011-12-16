<?php

/* --------------------------------------------------------------------------------------------------------------------------------
	
	Esta pagina implementa los formulariós basicos definidos para cada una de las entidades que componen el sistema:
	* Personas
	* Direcciones
	* Entes	
	
-------------------------------------------------------------------------------------------------------------------------------- */

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: persona
	Descripción: Función que implementa el formulario con los datos de las personas
	Desarrollador: Carlos Castillo
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function persona()
	{

?> 			
		<div id="persona">
			<h4>Datos de la Persona:</h4><br>
			<div id="usrCol1">
				Apellidos: 
			</div>
			<div id="usrCol2">
				<input type="text" name="Apellidos" id="Apellidos" value="" size="20"> <br />
			</div>
			<div id="usrCol3">
				Nombres:
			</div>
			<div id="usrCol4">
				<input type="text" name="Nombres" id="Nombres" value="" size="20"> <br />
			</div>
			<div id="usrCol1">
				Cedula:
			</div>
			<div id="usrCol2">
				<input type="text" name="Cedula" id="Cedula" value="" size="20"> <br />
			</div>
			<div id="usrCol3">
				Sexo:
			</div>
			<div id="usrCol4">
				<select id="Sexo" name="Sexo"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
					<option value=""> -- Seleccione -- </option>
					<option value="M"> Masculino </option>	
					<option value="F"> Femenino </option>
				</select>
			</div>
			<div id="usrCol1">
				Telefono:
			</div>
			<div id="usrCol2">
				<input type="text" name="Telefono" id="Telefono" value="" size="20"> <br />
			</div>
			<div id="usrCol3">
				Correo:
			</div>
			<div id="usrCol4">
				<input type="text" name="Correo" id="Correo" value="" size="20"> <br />
			</div>
		</div>
<?php
	}
		
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: direccion
	Descripción: Función que implementa el formulario con los datos de las personas
	Desarrollador: Carlos Castillo
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function direccion()
	{
?> 		
		<div id="direccion">
			<h4>Localidad:</h4><br>
			<div id="pais">
				<select id="Pais" name="Pais"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
					<option value=""> -- Seleccione Pais -- </option>
					<?php combo('*','Country','','Name'); ?>
				</select>
								
			</div>
			<div id="ciudad">
				<select id="Ciudad" name="Ciudad"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
					<option value=""> -- Seleccione Ciudad -- </option>
					<?php combo('*','City','','Name'); ?>
				</select>
				
			</div>
			<div id="municipio">
				<select id="Municipio" name="Municipio"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
					<option value=""> -- Seleccione Municipio -- </option>
					<?php combo('*','Country','','Name'); ?>
				</select>
			</div>
			<div id="parroquia">
				<select id="Parroquia" name="Parroquia"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
					<option value=""> -- Seleccione Parroquia -- </option>
					<?php combo('*','Country','','Name'); ?>
				</select>
			</div>
			<div id="comDir">
				Dirección: <input type="text" name="Direccion" id="Direccion" value="" size="40"> <br />
			</div>
		</div>
<?php
	}
		
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: persona
	Descripción: Función que implementa el formulario con los datos de las personas
	Desarrollador: Carlos Castillo
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Ente()
	{

?> 			
		<div id="ente">
			
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Usuario
	Descripción: Función que implementa el formulario con los datos referentes a un usuario
	Desarrollador: Carlos Castillo
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function usuario()
	{

?> 			
		<div id="usuario">
			<h4>Datos del Usuario:</h4><br>
			Cargo:
			<select id="Cargo" name="Cargo"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
				<option value=""> -- Seleccione cargo -- </option>
				<?php combo('*','cargos','','idCargo'); ?>
			</select> <br />
			Usuario: <input type="text" name="usrLogin" id="usrLogin" value="" size="20"> <br />
			Contraseña: <input type="password" name="usrPassword" id="usrPassword" value="" size="20">					
		</div>
<?php
	}
?>