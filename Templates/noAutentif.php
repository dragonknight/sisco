<?php 
	require("xajaxDeclaraciones.php"); //Invoco el archivo de declaración de Funciones
	$xajax->printJavascript('../Libs/xajax/');
?>
<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<link rel="icon" href="http://www.ezwp.com/sites/all/themes/ezwp/favicon.ico" type="image/x-icon" />
    		<link rel="shortcut icon" href="http://www.ezwp.com/sites/all/themes/ezwp/favicon.ico" type="image/x-icon" />
		<title>Sistema de Correspondencia -- SISCO -- </title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8" />
		<meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
		<link rel="stylesheet" type="text/css" href="../Static/Css/Principal.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../Libs/ddlevelsfiles/ddlevelsmenu-base.css" />
		<link rel="stylesheet" type="text/css" href="../Libs/ddlevelsfiles/ddlevelsmenu-topbar.css" />
		
		<script type="text/javascript" src="../Libs/ddlevelsfiles/ddlevelsmenu.js">
			/***********************************************
			* All Levels Navigational Menu- (c) Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
			* This notice MUST stay intact for legal use
			* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
			***********************************************/
		</script>
		<script type="text/javascript" src="../Static/Js/funciones.js"></script> <! -- Funciones js del sistema -- >
	</head>
	<div id="Contenedor">
		<div id="variables">
		</div>
<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- --> 
 
    	<div id="fade" class="overlay"></div>
		<div id="light" class="modal">
    		<p>Bienvenido al Sistema <br /><br />
    		<a href = "javascript:void(0)" onclick = "javascript:actuaLogin()">Aceptar</a></p>
    	</div>
<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- -->
		<div id="Cabecera">
			<div id="columna1">
				<img src="../Static/Images/escudo.gif" alt="EscudoMerida" >
			</div>
			<div id="columna2">
				<div id="TituloCabecera">
					Gobernación del Estado Mérida  <br />
					Secretaria General de Gobierno
				</div>
			</div>
			<div id="columna3">
				<img src="../Static/Images/bandera.gif" alt="BanderaMerida" >
			</div>
		</div>
		<div id="Menu">
			<?php 
				include ("./menu.php");
				menuNoAutent();
			?>
		</div>
		<div id="Contenido">
			<?php 
				include ("./principal.php");
			?>
		</div>
		<div id="Powered">
			<hr>
			<div id="Pcolumna1">
				Este sitio emplea:
			</div>
			<div id="Pcolumna2">
				<img src="../Static/Images/powered-by-debian-gnu-linux.png" alt="Debian" >
			</div>
			<div id="Pcolumna3">
				<img src="../Static/Images/powered-by-apache2.gif" alt="Apache" >
			</div>
		</div>
		<div id="Pie">
			Secretaria General de Gobierno <br />
			Entre Av. 3 y 4, Edificio del Palacio de Gobierno, Piso 1 <br />
			Teléfonos:			
		</div>
	</div>
</html>
