<?php
	session_start();

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: CambiaPagina
	Descripción:Función usada para navegar en el site, permite llamar a los templates y mostrarlos
	Desarrollador: fernand... (http://www.desarrolloweb.com/articulos/incluir-archivo-html-xajax.html)
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $archivo, $id
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
	función: Conectar
	Descripción:Función usada para establecer la conexión con bases de datos
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function conectar() 
	{
	   $con = mysql_connect("localhost","root","dr31c0");
	   if (!$con) {
	      die('Error de conexión: ' . mysql_error());
	   }
	   return $con;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Login
	Descripción:Función usada para establecer la conexión con bases de datos
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	function Login($autentificacion) 
	{
		// verifico que se hallan llenado los campos:
		// si los campos no estan llenos entonces le notifico al usuario...
		
		if(empty($autentificacion["login"]) || empty($autentificacion["password"]))
		{
			$idTrans ="6";
		   	$bitacora= Bitacora("Intento de Login sin Credenciales",$idTrans);
			$txt = "<div id=\"ErrorLogin\"> <h2> Error: Debes ingresar todos los Datos solicitados para acceder </h2></div>";
			
			$objResponse = new xajaxResponse();
	   	$objResponse->Assign("Error","innerHTML",$txt);
	   
	   	return $objResponse;
		}	
		// si los campos están llenos, entonces hay que validar que contengan los datos correctos:
		else 
		{  
		   $con = conectar();
		   mysql_select_db("sisco", $con);
		   $sql = "select * from usuarios where login='".$autentificacion["login"]."' and password='".$autentificacion["password"]."'";
		   $result = mysql_query($sql,$con);
		   
		   $txt = "";   
		   $row = mysql_fetch_array($result);
		   
		   //ya ejecutada la consulta, revisamos si se encontró un usuario con esas credenciales:
		   //si existe entonces:
		   if (($row["idPersona"]!= "") && ($row["login"]!= "") && ($row["password"]!= ""))
		   {
				
		     	$objResponse = new xajaxResponse();
		     	
			//cargo los parámetros de la sesión:
			$_SESSION['usuario']=$row['login'];
			$_SESSION['idCargo']=$row['idCargo'];
			$_SESSION['idUsuario']=$row['idPersona'];
	   		
			//Almaceno en bitácora el acceso correcto al sistema:
			$idTrans ="5";
		   	$bitacora= Bitacora("El usuario: ".$row['login']." accedio al Sisco",$idTrans);

	   		//Bloqueamos la pantalla y lanzamos la funcion para actualizar y cargar el menu y el escritorio del usuario:
	   		$objResponse->script("modal();");	
			$objResponse->redirect("./Autentificado.php",2);
	   		return $objResponse;
		      
		   }
		   
		   // de lo contrario, si no existe un usuario con esas credenciales procedemos a notificar
		   else 
		   {
		   	$idTrans ="6";
		   	$bitacora= Bitacora("Intento de Login con Credenciales Invalidas",$idTrans);
		   	$txt = "<div id=\"ErrorLogin\"> <h2> Error: Los datos ingresados no corresponden, verificarlos por favor </h2></div>";
		   	
		   	$objResponse = new xajaxResponse();
	   		$objResponse->Assign("Error","innerHTML",$txt);
	   
	   		return $objResponse;
		   }
		   mysql_close($con);
		}
	
	     
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ip
	Descripción: Función usada para obtener la ip del cliente (usada en la Bitacora)
	Desarrollador: http://blog.unijimpe.net/obtener-direccion-ip-con-php/
	
	Parámetros entrada: $mensaje
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
	función: Bitacora
	Descripción:Función usada para agregar eventos al log del sistema (Bitacora)
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $mensaje
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Bitacora($mensaje,$idTrans)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		$txt = "";		
		//averiguamos la ip del cliente:
		$ip = ip();
		//ingresamos a la B.D. el detalle del login infructuoso:
		$sql = "insert into bitacora (tipoTransaccion, detalle, ip) values ('" . $idTrans . "','" . $mensaje . "','" . $ip . "')";
		mysql_query($sql);
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ventanaError
	Descripción: Función que permite mostrar un mensaje de notificación usando Javascript
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida:
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ventanaError($mensaje)
	{
		$error='<script language="javascript"> alert("'.$mensaje.'")</script>';
	
	
	$objResponse = new xajaxResponse();
   $objResponse->Assign("Error","innerHTML",$error);
   
   return $objResponse;
	}
	
	require("xajaxDeclaraciones.php");
	$xajax->processRequest();
?>
