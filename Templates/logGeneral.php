<?php 
	//verifico que el usuario tenga privilegios para cargar esta pagina:
	if($_SESSION['usuario']== "0")
	{ 
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
		<p>
			Log General del sistema
		</p>
<?php	
	}
   else
   {
   	//Almaceno el intento de escalar privilegios en la bitácora
?>
	   <script type="text/javascript">
			bitacora('Llamada a una URL Restringida','7');
		</script>
		<p>Error, ud no tiene privilegios suficiente para acceder a esta pagina, este acto sera reportado</p>
<?php
   } 
?>