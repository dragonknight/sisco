<?php 
	session_start();
	if(!empty($_SESSION['usuario']))
	{ 
		/* La función empty() devuelve verdadero si el argumento posee un valor vacío, 
		al usar !empty() devuelve verdadero no solo si la variable fue declarada sino 
		además si contiene algún valor no nulo. 
		*/ 
		
		//incluyo el archivo de menu's (menu.php)
		include ("escritoriosDevel.php");
		
		if($_SESSION['idCargo']==0) 
		{							
			escritorioAdministrador();
		}
		if($_SESSION['idCargo']==1) 
		{							
			escritorioSG();
		}
		if($_SESSION['idCargo']==2) 
		{							
			escritorioCoordinador();
		}
		if($_SESSION['idCargo']==3) 
		{							
			escritorioGacetas();
		}
		if($_SESSION['idCargo']==4) 
		{							
			escritorioAudiencias();
		}
		if($_SESSION['idCargo']==5) 
		{							
			escritorioAsist();
		}
		if($_SESSION['idCargo']==6) 
		{							
			escritorioSecr();
		}
		if($_SESSION['idCargo']==7) 
		{							
			escritorioRecepcionista();
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
	