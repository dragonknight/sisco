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
						<p>
							Apellidos: <input type="text" name="persApellido" id="persApellido" value="" size="20"> <br />
							Nombres: <input type="text" name="persNombre" id="persNombre" value="" size="20"> <br />
							Cedula: <input type="text" name="perCedula" id="perCedula" value="" size="20"> <br />
							Sexo:<br />
							Telefono: <input type="text" name="perTelefono" id="perTelefono" value="" size="20"> <br />
							Correo: <input type="text" name="perCorreo" id="perCorreo" value="" size="20"> <br />
						</p>
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
	
	function direccion()
		{
?> 		
			<!-- <script language="javascript" type="text/javascript">xajax_Login('Name', 'Country', 'pais', 'pais')</script> -->
			<input type="button" value="Ingresar" onclick="xajax_comboPrincipal('*', 'Country', 'pais', 'pais')">
			<div id="dirección">
				Pais:<div id="pais"></div>
				Ciudad:<br />
				Municipio:<br />
				Parroquia:<br />
				Dirección:<br />
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
					<div id="ente">
						Cargo:
						Usuario: <input type="text" name="usrLogin" id="perTelefono" value="" size="20"> <br />
						Contraseña: <input type="password" name="usrPassword" id="usrPassword" value="" size="20">					
					</div>
<?php
		}
?>