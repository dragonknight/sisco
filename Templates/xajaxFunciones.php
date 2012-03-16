<?php
	session_start();

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
		$ip = "localhost";
		$path = "http://".$ip."/Sisco/Templates/".$archivo;
		$fp = fopen ($path,'rb');
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
	   $con = mysql_connect("localhost","root","mysql");
	   if (!$con) {
	      die('Error de conexi�n: ' . mysql_error());
	   }
	   return $con;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: Login
	Descripci�n:Funci�n usada para establecer la sesion
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
		{
			$idTrans ="6";
		   $bitacora= Bitacora("Intento de Login sin Credenciales",$idTrans);
		   $objResponse = new xajaxResponse();
			$objResponse->alert("Error: Debes ingresar todos los Datos solicitados para acceder.");
			$objResponse->assign("login","value","");
		   $objResponse->assign("password","value","");
	   	$objResponse->assign("submitButton","value","Reintentar");
			$objResponse->assign("submitButton","disabled",false);
	   
	   	return $objResponse;
		}	
		// si los campos est�n llenos, entonces hay que validar que contengan los datos correctos:
		else 
		{  
		   $con = conectar();
		   mysql_select_db("sisco", $con);
		   $sql = "select * from usuarios where login='".$autentificacion["login"]."' and password='".$autentificacion["password"]."'";
		   $result = mysql_query($sql,$con);
		      
		   $row = mysql_fetch_array($result);
		   
		   //ya ejecutada la consulta, revisamos si se encontr� un usuario con esas credenciales:
		   //si existe entonces:
		   if (($row["idPersona"]!= "") && ($row["login"]!= "") && ($row["password"]!= ""))
		   {
				
		     	$objResponse = new xajaxResponse();
		     	
				//cargo los par�metros de la sesi�n:
				$_SESSION['usuario']=$row['login'];
				$_SESSION['idCargo']=$row['idCargo'];
				$_SESSION['idUsuario']=$row['idPersona'];
	   		$_SESSION["Acceso"]= date("Y-n-j H:i:s"); //defino la fecha y hora de inicio de sesi�n en formato aaaa-mm-dd hh:mm:ss
	   		$_SESSION["maxTemp"]="180"; //Defino el tiempo para la caducidad de la sesi�n por inactividad
	   		global $_SESSION;
    
				//Almaceno en bit�cora el acceso correcto al sistema:
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
		   	$objResponse = new xajaxResponse();
		   	$objResponse->alert("Error: Los datos ingresados no corresponden, verificarlos por favor.");
		   	$objResponse->assign("login","value","");
		   	$objResponse->assign("password","value","");
		   	$objResponse->assign("submitButton","value","Reintentar");
	   		$objResponse->assign("submitButton","value","Reintentar");
				$objResponse->assign("submitButton","disabled",false);
	   
	   		return $objResponse;
		   }
		   mysql_close($con);
		}
	
	     
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: LogOut
	Descripci�n:Funci�n usada para cerrar la sesi�n
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	function LogOut() 
	{
		//Almaceno en bit�cora la salida del sistema:
		$idTrans ="8";
   	$bitacora= Bitacora("El usuario: ".$_SESSION['usuario']." cerro sesi�n en Sisco",$idTrans);
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
	funci�n: Incluir
	Descripci�n:Funci�n usada para mostrar formularios en forma modal
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: 
								$opcion = Opci�n del menu a la que ingreso el usuario
								$pagina = pagina que ser� mostrada en el modal
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Incluir($opcion,$pagina)
	{
		//Almaceno en bit�cora la llamada a la opci�n: 
		$idTrans ="9";
   	$bitacora= Bitacora("El usuario: ".$_SESSION['usuario']." accedi� a ".$opcion,$idTrans);

		//Bloqueamos la pantalla y mostramos la URL solicitada para la operaci�n:
		$includ=include($pagina);
		$objResponse = new xajaxResponse();
		$objResponse->Assign("light","innerHTML",$prueba);
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaTextSimp
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaTextSimp($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (trim($campo) == "")
		{
			$objResponse->alert("El ".$campo." no admite espacios en Blanco");
			$objResponse->assign($campo,"style.backgroundColor","#FF6666");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaTextComp
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaTextComp($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[a-zA-Z0-9]{2,250}$", $valor))
		{
			$objResponse->alert("El valor ingresado no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#FF6666");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaTextComp
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaNumeros($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[0-9]{2,20}$", $valor))
		{
			$objResponse->alert("El valor ".$valor. " ingresado en el campo" .$campo." no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#FF6666");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;	
	}
		
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaEmail
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaEmail($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[a-zA-Z0-9]+[_a-zA-Z0-9-]*(\.[_a-z0-9-]+)*@[a-z??????0-9]+(-[a-z??????0-9]+)*(\.[a-z??????0-9-]+)*(\.[a-z]{2,4})$", $valor))
		{
			$objResponse->alert("El valor ".$valor. " ingresado en el campo" .$campo." no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#FF6666");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaCombo
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaCedula($campo,$valor,$error)
	{	
		$con = conectar();
		mysql_select_db("sisco", $con);
				
		//Buscamos en la bd, que no exista un registro anterior
		$sql = "select count(*) from `personas` where `cedula` = ".$valor;
		$numero = mysql_query($sql);
		$result=mysql_fetch_array($numero);
		
		$objResponse = new xajaxResponse();
		$objResponse->alert("valor del sql " .$numero);
			
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: ValidaCombo
	Descripci�n:Funci�n usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaCombo($campo)
	{	
	}
	
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: guardaPersona
	Descripci�n:Funci�n usada para agregar personas en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaPersonaNoNat($formUsuario)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// ingresamos a la B.D. los detalles de la persona:
		$sql = "insert into noNat (id, nombre, tipo, telefono, correo, direccion, pais, ciudad, municipio, parroquia) values ('" . $formUsuario["Id"] . "','" . $formUsuario["Nombre"] . "','" . $formUsuario["TipoPersonaNNat"] . "','" . $formUsuario["Telefono"] . "','" . $formUsuario["Correo"] . "','" . $formUsuario["Direccion"] . "','" . $formUsuario["Pais"] . "','" . $formUsuario["Ciudad"] . "','" . $formUsuario["Municipio"] . "','" . $formUsuario["Parroquia"] . "')";
		mysql_query($sql) or die("Error al realizar la inserci�n ". mysql_error());
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: guardaPersona
	Descripci�n:Funci�n usada para agregar personas en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaPersona($formUsuario)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// ingresamos a la B.D. los detalles de la persona:
		$sql = "insert into personas (cedula, apellidos, nombres, sexo, telefono, correo, direccion, pais, ciudad, municipio, parroquia) values ('" . $formUsuario["Cedula"] . "','" . $formUsuario["Apellidos"] . "','" . $formUsuario["Nombres"] . "','" . $formUsuario["Sexo"] . "','" . $formUsuario["Telefono"] . "','" . $formUsuario["Correo"] . "','" . $formUsuario["Direccion"] . "','" . $formUsuario["Pais"] . "','" . $formUsuario["Ciudad"] . "','" . $formUsuario["Municipio"] . "','" . $formUsuario["Parroquia"] . "')";
		mysql_query($sql) or die("Error al realizar la inserci�n ". mysql_error());
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: guardaUsuario
	Descripci�n:Funci�n usada para agregar eventos al log del sistema (Bitacora)
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada: $mensaje
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaUsuario($formUsuario)
	{
		$objResponse = new xajaxResponse();
		
		if ($formUsuario["validaError"]=="0")
		{
			$con = conectar();
			mysql_select_db("sisco", $con);
			// Revisamos si se selecciono una persona o se agrego una nueva
			// si se agrego una nueva persona
			if ($formUsuario["comboPersonas"]=="0")
			{
				// llamamos a la Funcion que guarda los datos de las personas,
				$persona = guardaPersona ($formUsuario);
				// guardamos los datos del usuario:
				$sql = "insert into usuarios (idPersona, idCargo, login, password) values ('" . $formUsuario['Cedula'] . "','" . $formUsuario['Cargo'] . "','" . $formUsuario['usrLogin'] . "','" . $formUsuario['usrPassword'] . "')";
				mysql_query($sql) or die("Error al realizar la inserci�n ". mysql_error());
			}
			// si se selecciono una persona, entonces solo hay que agregar los datos de usuario
			else
			{			 
				// ingresamos a la B.D. los detalles del ahora usuario:
				$sql = "insert into usuarios (idPersona, idCargo, login, password) values ('" . $formUsuario['Cedula'] . "','" . $formUsuario['Cargo'] . "','" . $formUsuario['usrLogin'] . "','" . $formUsuario['usrPassword'] . "')";
				mysql_query($sql) or die("Error al realizar la inserci�n ". mysql_error()); 			 
			}
			// si el proceso de ingreso se llevo a cabo con exito, registramos el evento en la bitacora
			// primeramente definimos la ip del cliente:
			$bitacora= Bitacora("Se Agrego al usuario: ". $formUsuario['usrLogin'] ." al Sisco","1");
			mysql_close($con);
			
			$objResponse->alert("Datos Agregados.");
			$objResponse->assign("submitButton","value","Ingresar");
			$objResponse->assign("submitButton","disabled",false);
			$objResponse->redirect("./Autentificado.php",2);
		}
		else 
		{
			$objResponse->alert("Existen errores en el Formulario, Verifique e intente de nuevo.");
			$objResponse->assign("submitButton","value","Re - Ingresar");
			$objResponse->assign("submitButton","disabled",false);
		}
		return $objResponse;
	
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funci�n: comEntrante
	Descripci�n:Funci�n usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Par�metros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function comEntrante($formComunicacion)
	{	
		// Determinamos el tipo de persona que entrega
		// ---> Determinamos si se selecciono una persona o se agrego una nueva:
		
		if ($formComunicacion["cTipPersona"]=="1") // Persona Natural
		{
			if ($formComunicacion["comboPersonas"]=="0") // Se agrego una nueva persona
			{
				$id = $formComunicacion['Cedula'];
				$persona = guardaPersona($formComunicacion);
			}
		}
		elseif($formComunicacion["cTipPersona"]=="2") // Persona Jur�dica
		{
			if ($formComunicacion["comboPersonasNoNat"]=="0") // Se agrego una nueva persona
			{
				$id = $formComunicacion['Id'];
				$persona = guardaPersonaNoNat($formComunicacion);
			}
		}
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// Almacenamos los detalles de la comunicacion
		$sql = "insert into comunicaciones (numInterno, tProced, idProced, nComun, fecha, sintesis, caracter, prioridad, Resumen, tDirec, tCom) values ('" . $formComunicacion['numInterno'] . "','" . $formComunicacion['cTipPersona'] . "','" . $id . "','" . $formComunicacion['NumCom'] . "','" . $formComunicacion['Fecha'] . "','" . $formComunicacion['Sintesis'] . "','" . $formComunicacion['Caracter'] . "','" . $formComunicacion['Prioridad'] . "','" . $formComunicacion['Resumen'] . "','" . $formComunicacion['Via'] . "','" . $formComunicacion['tipCom'] . "')";
		mysql_query($sql) or die("Error al realizar la consulta: ". mysql_error());
		
		// Registramos la Transaccion en la Bitacora
		$bitacora= Bitacora("El usuario: ".$_SESSION['usuario'].". Ingreso la comunicaci�n ".$formComunicacion['numInterno']." ",'1');
		mysql_close($con);

		$objResponse = new xajaxResponse();
		$objResponse->alert("Datos Agregados.");
		$objResponse->assign("submitButton","value","Ingresar");
		$objResponse->assign("submitButton","disabled",false);
		$objResponse->redirect("./autentificado.php",2);
		return $objResponse;
	}
/*--------------------------------------------------- Disparador de salida -----------------------------------------------------*/

	require("xajaxDeclaraciones.php");
	$xajax->processRequest();
?>

