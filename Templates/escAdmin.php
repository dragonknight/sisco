<?php 
	//verificamos que el usuario que llama tenga los privilegios necesarios:
	if($_SESSION['idCargo']=='0')
	{
?>

		<div id="CasillaId">
			<p>
				Usuario:<?php echo " ".$_SESSION['usuario'] ?> <br />
				Nivel:<?php echo " ".$_SESSION['idCargo'] ?> 
			</p>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Operaciones:</h2>
		</div>
		<div id="resumenCont">
			<p id="subTitulo">Log del sistema:</p> 
		</div>
<?php
	} 
	else 
	{
		// si no posee los privilegios necesarios, alertamos un intento de escalada de privilegios de un usuario debidamente logeado:
?>
		<script type="text/javascript" src="../Static/Js/funciones.js"> 
			bitacora('Intento de escalar privilegios','7');
		</script> 
		
		<p>
			Error, la pagina que ha solicitado no esta disponible para su nivel de acceso, <br />
			Este incidente ha sido reportado al administrador del sistema...
		</p>
<?php
	}
?>