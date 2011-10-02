<?php


/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: CambiaPagina
	Descripci�n:Funci�n usada para navegar en el site, permite llamar a los templates y mostrarlos
	Desarrollador: fernand... (http://www.desarrolloweb.com/articulos/incluir-archivo-html-xajax.html)
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $archivo, $id
	Salida: $res
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function CambiaPagina($archivo, $id)
	{
		$path = $archivo;
		$fp = fopen ($path,'r');
		$codigo="";
		while ($linea = fgets($fp,1024))
		{
			if ($linea) $codigo .= $linea;
		}
		fclose($fp);
		$res=$codigo;
	
	   $objResponse = new xajaxResponse();
	   $objResponse->Assign($id,"innerHTML",$res);
	   
	   return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: Conectar
	Descripci�n:Funci�n usada para establecer la conexi�n con bases de datos
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function conectar() 
	{
	   $con = mysql_connect("localhost","root","dr31c0");
	   if (!$con) {
	      die('Error de conexi�n: ' . mysql_error());
	   }
	   return $con;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: Login
	Descripci�n:Funci�n usada para establecer la conexi�n con bases de datos
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	function Login($autentificacion) 
	{
		// verifico que se hallan llenado los campos:
		// si los campos no estan llenos entonces le notifico al usuario...
		
		if(empty($autentificacion["login"]) || empty($autentificacion["password"]))
			$txt = "<div id=\"ErrorLogin\"> <h2> Error: Debes ingresar todos los Datos solicitados para acceder </h2></div>";
			
		// si los campos est�n llenos, entonces hay que validar que contengan los datos correctos:
		else 
		{  
		   $con = conectar();
		   mysql_select_db("sisco", $con);
		   $sql = "select * from usuarios where login='".$autentifiacion["login"]."' and password='".$autentifiacion["password"]."'";
		   $result = mysql_query($sql,$con);
		   
		   $txt = "";   
		   $row = mysql_fetch_array($result);
		   
		   //ya ejecutada la consulta, revisamos si se encontr� un usuario con esas credenciales:
		   //si existe entonces:
		   if (($row["idPersona"]!= "") && ($row["login"]!= "") && ($row["password"]!= ""))
		   {
		   	
		   	//cargo los par�metros necesarios para la autentificaci�n:
		      	$_SESSION['usuario']=$row['login']; 
					$_SESSION['idCargo']=$row['idCargo'];
					$_SESSION['idUsuario']=$row['idPersona'];
				
				//teniendo las maletas es hora de tomar un vuelo: 
		     	$objResponse = new xajaxResponse();
	   		$objResponse->Redirect('./centroAuten.php',1);
	   		
	   		return $objResponse;
		      
		   }
		   
		   // de lo contrario, si no existe un usuario con esas credenciales procedemos a notificar
		   else 
		   {
		   	$bitacora= Bitacora("Intento de Login con Credenciales Invalidas");
		   	$txt = "<div id=\"ErrorLogin\"> <h2> Error: Los datos ingresados no corresponden, verificarlos por favor </h2></div>";
		   }
		   mysql_close($con);
		}
	
	   $objResponse = new xajaxResponse();
	   $objResponse->Assign("Error","innerHTML",$txt);
	   
	   return $objResponse;  
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ip
	Descripci�n: Funci�n usada para obtener la ip del cliente (usada en la Bitacora)
	Desarrollador: http://blog.unijimpe.net/obtener-direccion-ip-con-php/
	
	Par�metros entrada: $mensaje
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/	
	function ip() 
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			return $_SERVER['HTTP_CLIENT_IP'];
		        
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		    
		return $_SERVER['REMOTE_ADDR'];
	 }

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: Bitacora
	Descripci�n:Funci�n usada para agregar eventos al log del sistema (Bitacora)
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $mensaje
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Bitacora($mensaje)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		$txt = "";		
		//averiguamos la ip del cliente:
		$ip = ip();
		//ingresamos a la B.D. el detalle del login infructuoso:
		$sql = "insert into bitacora (tipoTransaccion, detalle, ip) values ('4','" . $mensaje . "','" . $ip . "')";
		mysql_query($sql);
	}

	require("xajaxDeclaraciones.php");
	$xajax->processRequest();
?>
