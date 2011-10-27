<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->

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
		$path = "http://localhost/Sisco/Templates/".$archivo;
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
	Descripción:Función usada para establecer la sesion
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
	   		$_SESSION["Acceso"]= date("Y-n-j H:i:s"); //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
	   		$_SESSION["maxTemp"]="180"; //Defino el tiempo para la caducidad de la sesión por inactividad
	   		global $_SESSION;
    
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
	función: LogOut
	Descripción:Función usada para cerrar la sesión
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	function LogOut() 
	{
		//Almaceno en bitácora la salida del sistema:
		$idTrans ="8";
   	$bitacora= Bitacora("El usuario: ".$_SESSION['usuario']." cerro sesión en Sisco",$idTrans);
   	
		unset($_SESSION['usuario']);
		unset($_SESSION['idCargo']);
		unset($_SESSION['idUsuario']);
		session_destroy();

		//Bloqueamos la pantalla notificamos el cierre de sesion y cargamos la pagina de cierre:
		$objResponse = new xajaxResponse();
		$objResponse->script("llamar_codigo('./logOut.php', 'light');");
		$objResponse->script("modal();");
		$objResponse->redirect("./noAutentif.php",2);
		return $objResponse;
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
	función: ConsultaBit
	Descripción:Función usada para consultar al log del sistema (Bitacora)
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: 
				$condicion = Valor de la Condición SQL
				$divResp = id del div donde se enviara la respuesta
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ConsultaBit($campos,$condicion,$divResp)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		$txt = "";		
		//Consultamos la BD:
		$sql = "select ".$campos." from bitacora ".$condicion;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		$objResponse = new xajaxResponse();
	   	$objResponse->Assign($divResp,"innerHTML",$row);
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Incluir
	Descripción:Función usada para actualizar el contenido mostrado incluyendo nuevos php's
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: 
				$pagina
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Incluir($opcion,$pagina)
	{
		//Almaceno en bitácora la llamada a la opción: 
		$idTrans ="9";
   	$bitacora= Bitacora("El usuario: ".$_SESSION['usuario']." accedió a ".$opcion,$idTrans);

		//Bloqueamos la pantalla y mostramos la URL solicitada para la operación:
		$prueba=include("./logGeneral.php");
		$objResponse = new xajaxResponse();
		$objResponse->script("llamar_codigo('./logGeneral.php', 'light');");
		//$objResponse->Assign("light","innerHTML",$prueba);
		$objResponse->script("modal();");
		return $objResponse;
	}
	
	require("xajaxDeclaraciones.php");
	$xajax->processRequest();
?>

