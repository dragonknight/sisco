<?php 
	session_start();
	if(!empty($_SESSION['usuario']))
	{ 
		/* La función empty() devuelve verdadero si el argumento posee un valor vacío, 
		al usar !empty() devuelve verdadero no solo si la variable fue declarada sino 
		además si contiene algún valor no nulo. 
		*/ 
		
		//incluyo el archivo de menu's (menu.php)
		include ("menu.php");
		
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
	}
	else
	{ 
?>
		<div id="errorPrivilegios">
			Error: No has accedido al sistema o tu sesión a caducado <br>
			Esta pagina es restringida, por lo que se guardara registro de este suceso.... <br>
		</div>
		<script type="text/javascript"> 
			bitacora('Llamada a una URL restringinada','7');
		</script>			 
<?php
	} 
?>
	