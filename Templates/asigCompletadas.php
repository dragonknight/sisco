<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
<?php 
	session_start();
	if(!empty($_SESSION['usuario']) && $_SESSION['idCargo'] == 1 || $_SESSION['idCargo'] == 2)
	{ 
		/* La función empty() devuelve verdadero si el argumento posee un valor vacío, 
		al usar !empty() devuelve verdadero no solo si la variable fue declarada sino 
		además si contiene algún valor no nulo. 
		*/ 
		require("xajaxDeclaraciones.php"); //Invoco el archivo de declaración de Funciones
		$xajax->printJavascript('../Libs/xajax/');
		
		//Ejecuto el calculo del tiempo de la sesión, para hacerla caducar de ser necesario:
		$ultimaTrans = $_SESSION["Acceso"]; //registro la variable de la ultima transacción hecha
	   $ahora = date("Y-n-j H:i:s"); //registro la hora actual
   	$tiempo_transcurrido = (strtotime($ahora)-strtotime($ultimaTrans)); //calculo el tiempo transcurrido
    	
    	//comparamos el tiempo transcurrido
     	if($tiempo_transcurrido >= $_SESSION["maxTemp"]) 
     	{
     		//si paso mas tiempo del indicado para caducar la sesión entonces invoco el js de cerrar sesión
?>   	 
      	<script type="text/javascript">
				logOut();
			</script>
<?php	
    	}
    	else
    	{
    		$_SESSION["ultimoAcceso"] = $ahora;
   	} 
?>
		<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
			<?php 
				include ("./Base/head.html");
			?>
			<body>
<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- --> 
			 
		    	<div id="fade" class="overlay"></div>
				<div id="light" class="modal">
		    	</div>
			   
				<div id="Contenedor">
					<?php 
						include ("./Base/cabecera.html");
					?>
					
					<div id="Menu">
						<?php 
							//incluyo el archivo de menu's (menu.php)
							include ("./menu.php");
			
							if($_SESSION['idCargo']==0) //administrador
							{							
								menuAdministrador();
							}
							if($_SESSION['idCargo']==1) //secretario general
							{							
								menuCompleto();
							}
							if($_SESSION['idCargo']==2) //coordinador
							{							
								menuCompleto();
							}
							if($_SESSION['idCargo']==3) //encargado gacetas
							{							
								menuGacetas();
							}
							if($_SESSION['idCargo']==4) //encargado audiencias
							{							
								menuAudiencias();
							}
							if($_SESSION['idCargo']==5) //asistentes
							{							
								menuAsistSecr();
							}
							if($_SESSION['idCargo']==6) //secretarias
							{							
								menuAsistSecr();
							}
							if($_SESSION['idCargo']==7) //recepcionistas
							{							
								menuRecepcionista();
							}
						?>
					</div>
					<div id="Contenido">
						<?php
							include ("./entidades.php");
							include ("./funciones.php");
							include ("./plantillas.php");
						?>
						<div id="formUser">
							<h3>Reportar comunicaci�n Procesada:</h3><br>
							<div id="cEstandar">
								<form id="consultar" action="javascript:void(null);" onsubmit="consultAsigList();">
									<br />
									<input id="submitButton" type="submit" value="Cargar"/>
								</form>
								<div id="Error">
								</div>
								<div id="Resultados">
								</div>
							</div>
						</div>
					</div>
					<?php 
						include ("./Base/powered.html");
						include ("./Base/pie.html");
					?>
				</div>
			</body>
		</html>
<?php		
	}
	else 
	{
		include ("./Base/paginaError.php");
	}
?>	