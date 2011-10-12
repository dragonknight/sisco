<?php 
	session_start();
	if(!empty($_SESSION['usuario']))
	{ 
		/* La función empty() devuelve verdadero si el argumento posee un valor vacío, 
		al usar !empty() devuelve verdadero no solo si la variable fue declarada sino 
		además si contiene algún valor no nulo. 
		*/ 
		
		//incluyo el archivo de menu's (menu.php)
		echo "esto funciona";
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
?>
	
