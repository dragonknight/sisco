<?php
	require("xajaxDeclaraciones.php"); //Invoco el archivo de declaración de Funciones
	$xajax->printJavascript('../Libs/xajax/');
?>	
	<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
		<?php 
			include ("./Base/head.html");
		?>
		<body>
			<div id="Contenedor">
				<?php 
					include ("./Base/cabecera.html");
				?>
				<div id="Menu">
					<?php 
						//incluyo el archivo de menu's (menu.php)
						include ("./menu.php");	
						menuNoAutent();
					?>
				</div>
				<div id="Contenido">
					<div id="errorLogin">
						<p>
							Error, no ha iniciado Sesión, o su Sesión en el sistema de Correspondencia Sisco a caducado;
							Este incidente sera notificado al administrador del sistema...
						</p>
					</div>
				</div>
				<script type="text/javascript"> 
					xajax_Bitacora('Intento de escalar privilegios','7'); //alternativamente podemos colocar language="JavaScript"
				</script> 
				<?php 
					include ("./Base/powered.html");
					include ("./Base/pie.html");
				?>
			</div>
		</body>
	</html>