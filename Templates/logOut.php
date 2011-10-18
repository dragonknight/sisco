<?php
	$_SESSION['usuario']='';
	//unset($_SESSION['usuario']); 
	unset($_SESSION['idCargo'])
	session_destroy();
	if(!empty($_SESSION['usuario']))
	{
?>
		<h2>
			Su sesión en el sistema de correspondencia de la Secretaria General --SISCO--  ha terminado <br>
		</h2>
		Hasta luego.
		<a href = "./noAutentif.php">Aceptar</a>
<?php
	}
	else 
	{
?>
		<h2>
			No se ha podido destruir su sesión, intente nuevamente....
		</h2>
<?php
	}
?>