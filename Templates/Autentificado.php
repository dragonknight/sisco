<?php 
	session_start();
	if(!empty($_SESSION['usuario']))
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
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
			<head>
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
				<script type="text/javascript">
					ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
				</script>
				<script type="text/javascript" src="../Static/Js/funciones.js"></script> <! -- Funciones js del sistema -- >
			</head>
			<div id="Contenedor">
				<div id="variables">
				</div>
		<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- --> 
		 
		    	<div id="fade" class="overlay"></div>
				<div id="light" class="modal">
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
						//incluyo el archivo de menu's (menu.php)
						include ("./menu.php");
		
						if($_SESSION['idCargo']==0) 
						{							
							menuAdministrador();
						}
						if($_SESSION['idCargo']==1) 
						{							
							menuCompleto();
						}
						if($_SESSION['idCargo']==2) 
						{							
							menuCompleto();
						}
						if($_SESSION['idCargo']==3) 
						{							
							menuGacetas();
						}
						if($_SESSION['idCargo']==4) 
						{							
							menuAudiencias();
						}
						if($_SESSION['idCargo']==5) 
						{							
							menuAsistSecr();
						}
						if($_SESSION['idCargo']==6) 
						{							
							menuAsistSecr();
						}
						if($_SESSION['idCargo']==7) 
						{							
							menuRecepcionista();
						}
					?>
				</div>
				<div id="Contenido">
					<?php 

						if($_SESSION['idCargo']==0) 
						{							
							include ("escAdmin.php");
						}
						if($_SESSION['idCargo']==1) 
						{							
							
						}
						if($_SESSION['idCargo']==2) 
						{							
							
						}
						if($_SESSION['idCargo']==3) 
						{
													
						}	
						if($_SESSION['idCargo']==4) 
						{							
							
						}
						if($_SESSION['idCargo']==5) 
						{							
							
						}
						if($_SESSION['idCargo']==6) 
						{							
							
						}
						if($_SESSION['idCargo']==7) 
						{							

						}
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
<?php		
	}
	else 
	{
?>	
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
			<head>
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
				<script type="text/javascript" src="../Static/Js/funciones.js"></script> <! -- Funciones js del sistema -- >
			</head>
			<div id="Contenedor">
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
						//incluyo el archivo de menu's (menu.php)
						include ("./menu.php");	
						menuNoAutent();
					?>
				</div>
				<div id="Contenido">
					<div id="errorLogin">
						<p>
							Error, no ha iniciado Sesión, o su Sesión en el sistema de Correspondencia Sisco a caducado;
						</p>
					</div>
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
<?php		
	}
?>	