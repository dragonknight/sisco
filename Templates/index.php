<?php  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<?php
			require("xajaxDeclaraciones.php"); //Invoco el archivo de declaración de Funciones
			$xajax->printJavascript('../Libs/xajax/'); 
		?>
		<title>Sistema de Correspondencia -- SISCO -- </title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8" />
		<meta http-equiv="Cache-Control" content="max-age=86400" />
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
		<script>
			function llamar_codigo(archivo,id_capa)
			{
				xajax_CambiaPagina(archivo,id_capa);

			}
			function modal()
			{
				document.getElementById('fade').style.display='block';
				document.getElementById('light').style.display='block';				
			}
			function actuaLogin()
			{
				llamar_codigo('menuAutentif.php','Menu');
				llamar_codigo('escritorios.php','Contenido');
				document.getElementById('light').style.display='none';
				document.getElementById('fade').style.display='none';
			}
			function bitacora(mensaje,idtrans)
			{
				xajax_Bitacora(mensaje,idTrans);

			}			
		</script>
	</head>
	<div id="Contenedor">
<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- --> 
 
    	<div id="fade" class="overlay"></div>
		<div id="light" class="modal">
    		<p>Bienvenido al Sistema... <a href = "javascript:void(0)" onclick = "javascript:actuaLogin()">Aceptar</a></p>
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
			<script type="text/javascript"> 
				modal();
			</script>
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
