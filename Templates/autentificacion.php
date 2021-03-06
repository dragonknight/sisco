<?php
	session_start();
	require("../Static/Xajax/xajaxDeclaraciones.php"); //Invoco el archivo de declaración de Funciones
	$xajax->printJavascript('../Libs/xajax/');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<?php 
		include ("./Base/head.html");
	?>
<!-- ------------------------------------------------------- ventana modal ------------------------------------------------------- -->
	<body>
		<div id="fade" class="overlay"></div>
		<div id="light" class="modal">
	 		<p>Bienvenido al Sistema <br /><br />
	 		<a href = "javascript:void(0)" onclick = "javascript:actuaLogin()">Aceptar</a></p>
	 	</div>
		<div id="Contenedor">
			<?php 
				include ("./Base/cabecera.html");
			?>
			<div id="Menu">
				<?php 
					include ("./menu.php");
					menuNoAutent();
				?>
			</div>
			<div id="Contenido">
				<div id="Notificación">
					Has ingresado al área de autenticación de la Plataforma.
					Por favor introduce tus credenciales para continuar:
				</div>
				<div id="formLogin">
					<form id="autentif" action="javascript:void(null);" onsubmit="autenticar();">
						<div id="loginCol1">
							Usuario:
						</div>
						<div id="loginCol2">
							<input type="text" name="login" id="login" value="" size="20" onchange="javascript:limpiaError()"> <br /> <!-- El evento onfocus limpia los mensajes de error (si hay alguno) -->
						</div>
						<div id="loginCol1">
							Contraseña:
						</div>
						<div id="loginCol2">
							<input type="password" name="password" id="password" value="" size="20" onchange="javascript:limpiaError()"> <!-- El evento onfocus limpia los mensajes de error (si hay alguno) -->
						</div>
						<input id="submitButton" type="submit" value="Ingresar"/>
					</form>
				</div>
				<div id="Error">
				</div>
			</div>
				<?php 
					include ("./Base/powered.html");
					include ("./Base/pie.html");
				?>
		</div>
	</body>
</html>
