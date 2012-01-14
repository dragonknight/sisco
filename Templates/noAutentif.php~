<?php 
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
				<?php 
					include ("./principal.php");
				?>
			</div>
				<?php 
					include ("./Base/powered.html");
					include ("./Base/pie.html");
				?>
		</div>
	</body>
</html>
