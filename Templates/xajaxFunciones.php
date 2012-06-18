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
	función: Conectar
	Descripción:Función usada para establecer la conexión con bases de datos
	Desarrollador: amperis.blogspot.com
	Modificado: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: ---
	Salida: $con
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function conectar() 
	{
	   $con = mysql_connect("localhost","root","mysql");
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
		   $objResponse = new xajaxResponse();
			$objResponse->alert("Error: Debes ingresar todos los Datos solicitados para acceder.");
			$objResponse->assign("login","value","");
		   $objResponse->assign("password","value","");
	   	$objResponse->assign("submitButton","value","Reintentar");
			$objResponse->assign("submitButton","disabled",false);
	   
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
	función: Incluir
	Descripción:Función usada para mostrar formularios en forma modal
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: 
								$opcion = Opción del menu a la que ingreso el usuario
								$pagina = pagina que será mostrada en el modal
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Incluir($opcion,$pagina)
	{
		//Almaceno en bitácora la llamada a la opción: 
		$idTrans ="9";
   	$bitacora= Bitacora("El usuario: ".$_SESSION['usuario']." accedió a ".$opcion,$idTrans);

		//Bloqueamos la pantalla y mostramos la URL solicitada para la operación:
		$includ=include($pagina);
		$objResponse = new xajaxResponse();
		$objResponse->Assign("light","innerHTML",$prueba);
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaTextSimp
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaTextSimp($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (trim($campo) == "")
		{
			$objResponse->alert("El ".$campo." no admite espacios en Blanco");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaTextComp
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaTextComp($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[a-zA-ZñÑ0-9\s]{2,250}$", $valor))
		{
			$objResponse->alert("El valor ingresado no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaTextComp
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaNumeros($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[0-9]{2,20}$", $valor))
		{
			$objResponse->alert("El valor ".$valor. " ingresado en el campo" .$campo." no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;	
	}
		
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaEmail
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaEmail($campo,$valor)
	{
		$objResponse = new xajaxResponse();
		if (!eregi("^[a-zA-Z0-9]+[_a-zA-Z0-9-]*(\.[_a-z0-9-]+)*@[a-z??????0-9]+(-[a-z??????0-9]+)*(\.[a-z??????0-9-]+)*(\.[a-z]{2,4})$", $valor))
		{
			$objResponse->alert("El valor ".$valor. " ingresado en el campo" .$campo." no es valido");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
		}
		else 
		{
			$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
		}
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaCombo
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaCedula($campo,$valor)
	{	
		$objResponse = new xajaxResponse();		
		if (!eregi("^[0-9]{7,8}$", $valor))
		{
			$objResponse->alert("La cedula debe tener al menos 7 digitos");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
			$objResponse->assign('submitButton',"disabled=true");
			$objResponse->assign('submitButton',"value","Verifique los datos");
		}
		else 
		{
			$con = conectar();
			mysql_select_db("sisco", $con);
			$query="SELECT COUNT(*)FROM personas where cedula = ".$valor;
			$result = mysql_query($query) or die("Error al realizar la consulta: ".mysql_error());
	 		$cuantos = mysql_fetch_array($result);
	 		if ($cuantos[0]>0)
	 		{
				$objResponse->alert("La cedula ya se encuantra en el sistema");
				$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
				$objResponse->assign('submitButton',"disabled=true");
				$objResponse->assign('submitButton',"value","Verifique los datos");
			}
			else 
			{
				$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
				$objResponse->assign('submitButton',"disabled=false");
				$objResponse->assign('submitButton',"value","Ingresar");
			}
		}
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaCombo
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaUsuario($campo,$valor)
	{	
		$objResponse = new xajaxResponse();		
		if (!eregi("^[a-zA-Z0-9]{5,20}$", $valor))
		{
			$objResponse->alert("El Usuario debe tener entre 5 y 20 digitos");
			$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
			$objResponse->assign('submitButton',"disabled=true");
			$objResponse->assign('submitButton',"value","Verifique los datos");
		}
		else 
		{
			$con = conectar();
			mysql_select_db("sisco", $con);
			$query="SELECT COUNT(*)FROM usuarios where login = '".$valor."'";
			$result = mysql_query($query) or die("Error al realizar la consulta");
	 		$cuantos = mysql_fetch_array($result);
	 		if ($cuantos[0]>0)
	 		{
				$objResponse->alert("El Usuario ya se encuantra en el sistema");
				$objResponse->assign($campo,"style.backgroundColor","#DE4A4A");
				$objResponse->assign('submitButton',"disabled=true");
				$objResponse->assign('submitButton',"value","Verifique los datos");
			}
			else 
			{
				$objResponse->assign($campo,"style.backgroundColor","#CCFF99");
				$objResponse->assign('submitButton',"disabled=false");
				$objResponse->assign('submitButton',"value","Ingresar");
			}
			
		}
		return $objResponse;
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: ValidaCombo
	Descripción:Función usada para Validar los Campos en el sistema.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $campo
	Salida: 
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function ValidaCombo($campo)
	{	
	}
	
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: guardaPersona
	Descripción:Función usada para agregar personas en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaPersonaNoNat($formUsuario)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// ingresamos a la B.D. los detalles de la persona:
		$sql = "insert into noNat (id, nombre, tipo, telefono, correo, direccion, pais, ciudad) values ('" . $formUsuario["Id"] . "','" . $formUsuario["Nombre"] . "','" . $formUsuario["TipoPersonaNNat"] . "','" . $formUsuario["Telefono"] . "','" . $formUsuario["Correo"] . "','" . $formUsuario["Direccion"] . "','" . $formUsuario["Pais"] . "','" . $formUsuario["Ciudad"] . "')";
		mysql_query($sql) or die("Error al realizar la inserción ". mysql_error());
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: guardaPersona
	Descripción:Función usada para agregar personas en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaPersona($formUsuario)
	{
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// ingresamos a la B.D. los detalles de la persona:
		$sql = "insert into personas (cedula, apellidos, nombres, sexo, telefono, correo, direccion, pais, ciudad) values ('" . $formUsuario["Cedula"] . "','" . $formUsuario["Apellidos"] . "','" . $formUsuario["Nombres"] . "','" . $formUsuario["Sexo"] . "','" . $formUsuario["Telefono"] . "','" . $formUsuario["Correo"] . "','" . $formUsuario["Direccion"] . "','" . $formUsuario["Pais"] . "','" . $formUsuario["Ciudad"] . "')";
		mysql_query($sql) or die("Error al realizar la inserción ". mysql_error());
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: guardaUsuario
	Descripción:Función usada para agregar eventos al log del sistema (Bitacora)
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada: $mensaje
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function guardaUsuario($formUsuario)
	{
		$objResponse = new xajaxResponse();
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
				mysql_query($sql) or die("Error al realizar la inserción ". mysql_error());
			}
			// si se selecciono una persona, entonces solo hay que agregar los datos de usuario
			else
			{			 
				// ingresamos a la B.D. los detalles del ahora usuario:
				$sql = "insert into usuarios (idPersona, idCargo, login, password) values ('" . $formUsuario['Cedula'] . "','" . $formUsuario['Cargo'] . "','" . $formUsuario['usrLogin'] . "','" . $formUsuario['usrPassword'] . "')";
				mysql_query($sql) or die("Error al realizar la inserción ". mysql_error()); 			 
			}
			// si el proceso de ingreso se llevo a cabo con exito, registramos el evento en la bitacora
			// primeramente definimos la ip del cliente:
			$bitacora= Bitacora("Se Agrego al usuario: ". $formUsuario['usrLogin'] ." al Sisco","1");
			mysql_close($con);
			
			$objResponse->alert("Datos Agregados.");
			$objResponse->assign("submitButton","value","Ingresar");
			$objResponse->assign("submitButton","disabled",false);
			$objResponse->redirect("./Autentificado.php",1);
		return $objResponse;
	
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function comEntrante($formComunicacion)
	{	
		// Determinamos el tipo de persona que entrega
		// ---> Determinamos si se selecciono una persona o se agrego una nueva:
		
		if ($formComunicacion["cTipPersona"]=="1") 					// Persona Natural
		{
			if ($formComunicacion["comboPersonas"]=="0") 			// Se agrego una nueva persona
			{
				$id = $formComunicacion['Cedula'];
				$persona = guardaPersona($formComunicacion);
			}
			else																	// Si se selecciono una persona
			{
				$id = $formComunicacion['comboPersonas'];
			}
		}
		elseif($formComunicacion["cTipPersona"]=="2") 				// Persona Jurídica
		{
			if ($formComunicacion["comboPersonasNoNat"]=="0") 		// Se agrego una nueva persona
			{
				$id = $formComunicacion['Id'];
				$persona = guardaPersonaNoNat($formComunicacion);
			}
			else																	// Si se selecciono una persona
			{
				$id = $formComunicacion['comboPersonasNoNat'];
			}
		}
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// Almacenamos los detalles de la comunicacion
		$sql = "insert into comunicaciones (numInterno, tProced, idProced, nComun, fecha, sintesis, caracter, prioridad, Resumen, tDirec, Status, tCom) values ('" . $formComunicacion['numInterno'] . "','" . $formComunicacion['cTipPersona'] . "','" . $id . "','" . $formComunicacion['NumCom'] . "','" . $formComunicacion['Fecha'] . "','" . $formComunicacion['Sintesis'] . "','" . $formComunicacion['Caracter'] . "','" . $formComunicacion['Prioridad'] . "','" . $formComunicacion['Resumen'] . "','" . $formComunicacion['Via'] . "', '1','" . $formComunicacion['tipCom'] . "')";
		mysql_query($sql) or die("Error al realizar la consulta: ". mysql_error());
		
		// Registramos la Transaccion en la Bitacora
		$bitacora= Bitacora("El usuario: ".$_SESSION['usuario'].". Ingreso la comunicación ".$formComunicacion['numInterno']." ",'1');
		mysql_close($con);

		$objResponse = new xajaxResponse();
		$objResponse->alert("Datos Agregados.");
		$objResponse->assign("submitButton","value","Ingresar");
		$objResponse->assign("submitButton","disabled",false);
		$objResponse->redirect("./autentificado.php",2);
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comSaliente
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function comSaliente($formComunicacion)
	{	
		// Determinamos el tipo de persona que entrega
		// ---> Determinamos si se selecciono una persona o se agrego una nueva:
		
		if ($formComunicacion["cTipPersona"]=="1") 					// Persona Natural
		{
			if ($formComunicacion["comboPersonas"]=="0") 			// Se agrego una nueva persona
			{
				$id = $formComunicacion['Cedula'];
				$persona = guardaPersona($formComunicacion);
			}
			else																	// Si se selecciono una persona
			{
				$id = $formComunicacion['comboPersonas'];
			}
		}
		elseif($formComunicacion["cTipPersona"]=="2") 				// Persona Jurídica
		{
			if ($formComunicacion["comboPersonasNoNat"]=="0") 		// Se agrego una nueva persona
			{
				$id = $formComunicacion['Id'];
				$persona = guardaPersonaNoNat($formComunicacion);
			}
			else																	// Si se selecciono una persona
			{
				$id = $formComunicacion['comboPersonasNoNat'];
			}
		}
		$con = conectar();
		mysql_select_db("sisco", $con);
		
		// Almacenamos los detalles de la comunicacion
		$sql = "insert into comunicaciones (numInterno, tProced, idProced, nComun, fecha, sintesis, caracter, prioridad, Resumen, tDirec, Status, tCom) values ('" . $formComunicacion['numInterno'] . "','" . $formComunicacion['cTipPersona'] . "','" . $id . "','" . $formComunicacion['NumCom'] . "','" . $formComunicacion['Fecha'] . "','" . $formComunicacion['Sintesis'] . "','" . $formComunicacion['Caracter'] . "','" . $formComunicacion['Prioridad'] . "','" . $formComunicacion['Resumen'] . "','" . $formComunicacion['Via'] . "', '1','" . $formComunicacion['tipCom'] . "')";
		mysql_query($sql) or die("Error al realizar la consulta: ". mysql_error());
		
		// Registramos la Transaccion en la Bitacora
		$bitacora= Bitacora("El usuario: ".$_SESSION['usuario'].". Ingreso la comunicación ".$formComunicacion['numInterno']." ",'1');
		mysql_close($con);

		$objResponse = new xajaxResponse();
		$objResponse->alert("Datos Agregados.");
		$objResponse->assign("submitButton","value","Ingresar");
		$objResponse->assign("submitButton","disabled",false);
		$objResponse->redirect("./Autentificado.php",2);
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function buscaComu($formComunicacion)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT *FROM comunicaciones where numInterno = '".$formComunicacion['comunicacion']."'";
		$result = mysql_query($query) or die("Error al realizar la consulta");
	 	$cuantos = mysql_fetch_array($result);
	 	$txt = "<br /><hr /><br />";
	 	$txt = $txt."<div>Numero: ".$cuantos[0]."</div>";
	 	$txt = $txt."<div>Solicitante: ". $cuantos[2]."</div>";
	 	$txt = $txt."<div>Sintesis: ". $cuantos[5]."</div>";
	 	$txt = $txt."<div>Fecha: ". $cuantos[4]."</div>";
	 	$txt = $txt."<div>Direccionalidad: ". $cuantos[9]."</div>";
	 	$txt = $txt ."<div>Tipo: ". $cuantos[11]."</div>";
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
		return $objResponse;

	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function buscaExp($formExp)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM comunicaciones where idProced = '".$formExp['cedula']."'";
		$result = mysql_query($query) or die("Error al realizar la consulta");
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt ."<br /><hr /><br />";
			$txt = $txt."<div>Numero: ".$fila[0]."</div>";
			$txt = $txt."<div>Solicitante: ". $fila[2]."</div>";
			$txt = $txt."<div>Sintesis: ".$fila[5]."</div>";
			$txt = $txt."<div>Fecha: ".$fila[4]."</div>";
			$txt = $txt."<div>Direccionalidad: ".$fila[9]."</div>";
			$txt = $txt ."<div>Tipo: ".$fila[11]."</div>";
		}
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
		return $objResponse;

	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function buscaXAsig($formExp)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM comunicaciones where Status = 1 && tDirec = 'Entrante' ";
		$result = mysql_query($query) or die("Error al realizar la consulta");
		$i=1;
		$txt= "";
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt."<br /> <hr /> <br />";
			$txt = $txt ."<form id='".$i."' action='javascript:void(null);' onsubmit='asignar(this.id);'>";
				$txt = $txt."Numero: <input name='num".$i."' type='text' id='num".$i."' value=".$i." readonly='readonly'><br />";
				$txt = $txt."ID SISCO: <input name='idSisco".$i."' type='text' id='idSisco".$i."' value=".$fila[0]." readonly='readonly'><br />";
				$txt = $txt."<div>Solicitante: <input name='solicitante".$i."' type='text' id='solicitante".$i."' value='".$fila[2]."' readonly='readonly'><br />";
				$txt = $txt."<div>Sintesis: <input name='sintesis".$i."' type='text' id='sintesis".$i."' value=".$fila[5]." readonly='readonly'><br />";
				$txt = $txt."<div>Fecha: <input name='fecha".$i."' type='text' id='fecha".$i."' value=".$fila[4]." readonly='readonly'><br />";
				$txt = $txt."<div>Direccionalidad: <input name='direccional".$i."' type='text' id='direccional".$i."' value=".$fila[9]." readonly='readonly'><br />";
				$txt = $txt ."<div>Tipo: <input name='tipo".$i."' type='text' id='tipo".$i."' value=".$fila[11]." readonly='readonly'><br />";
				$txt = $txt ."<fieldset>";
					$txt = $txt ."<legend>Opciones</legend>";
					//Agrego la opcion para asignar la comunicación
					$txt = $txt ."<br />";
					$txt = $txt ."<input type='radio' name='Procesar".$i."' id='".$i."' value='A' onclick='activaCombAsig(this.value, this.id)' /> Asignar a: ";
					//Inicializo el combo para asignar a personal
					$txt = $txt ."<select name='funcionario".$i."' id='funcionario".$i."'  disabled='true'>";
					$txt = $txt ."<option value='0'> --Seleccione Funcionario-- </option>";
					// Ejecuto una consulta para determinar a quienes puedo asignar la comunicación
					$query2 = "select  * from usuarios where idCargo = 3 || idCargo =4 || idCargo =5 || idCargo =6 order by idCargo";
					$result2 = mysql_query($query2,$con) or die("Error al realizar la consulta: ");
					while($opciones = mysql_fetch_array($result2,MYSQL_BOTH))
					{
						$txt = $txt ."<option value=". $opciones[0].">". $opciones[2]. ", ".$opciones[0]."</option>";
					}
					$txt = $txt ."</select> <br />";
					//Agrego la opcion para finalizar comunicación
					$txt = $txt ."<input type='radio' name='Procesar".$i."' id='".$i."' value='P' onclick='activaCombAsig(this.value, this.id)' /> Marcar como Procesada ";
					$txt = $txt ."<br /><br />";
					$txt = $txt ."<input id='submitButton".$i."' type='submit' value='Procesar' disabled='true'/>";
					$txt = $txt ."<br /><br />";
				$txt = $txt ."</fieldset>";
				$i = $i+1;
			$txt = $txt ."</form>";
		}
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
	 	$objResponse->assign("submitButton","value","Actualizar");
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function Asigna($formAsig, $bandera)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		if ($formAsig['Procesar'.$bandera] =="A") //Si la comunicación se marco para ser asignada
		{
			// Modifico el estatus de la comunicación en la tabla comunicaciones
			$query="UPDATE comunicaciones set Status = 2 where numInterno='".$formAsig['idSisco'.$bandera]."'";
			$result = mysql_query($query) or die("Error al ejecutar el query");
			// Cargo la asignación en la tabla de asignaciones
			$query2 = "insert into asignaciones (numInterno, Usuario, statusAsig) values ('" .$formAsig['idSisco'.$bandera]. "','" .$formAsig['funcionario'.$bandera]. "',2)";
			mysql_query($query2) or die("Error al realizar la consulta: ". mysql_error());
		}
		else // si la comunicación se marco como procesada
		{
			// Modificico el estatus de la comunicación en la tabla comunicaciones
			$query="UPDATE comunicaciones set Status = 6 where numInterno='".$formAsig['idSisco'.$bandera]."'";
			$result = mysql_query($query) or die("Error al ejecutar el query");
		}
		//Recargo la pagina de asignaciones...
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function consultAsig($formExp)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM asignaciones where Usuario = ".$_SESSION['idUsuario'];
		$result = mysql_query($query) or die("Error al realizar la consulta");
		$i=1;
		$txt= "";
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt."<br /> <hr /> <br />";
			$txt = $txt."Numero: <input name='num".$i."' type='text' id='num".$i."' value=".$i." readonly='readonly'><br />";
			$txt = $txt."ID SISCO: <input name='idSisco".$i."' type='text' id='idSisco".$i."' value=".$fila[2]." readonly='readonly'><br />";			
			$txt = $txt."<div>Fecha: <input name='fecha".$i."' type='text' id='fecha".$i."' value=".$fila[1]."><br />";
			$i = $i+1;
		}
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
	 	$objResponse->assign("submitButton","value","Actualizar");
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function consultAsig2($formExp)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM asignaciones where Usuario = ".$_SESSION['idUsuario']." && statusAsig = 2";
		$result = mysql_query($query) or die("Error al realizar la consulta");
		$i=1;
		$txt= "";
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt."<br /> <hr /> <br />";
			$txt = $txt ."<form id='".$i."' action='javascript:void(null);' onsubmit='procesada(this.id);'>";
				$txt = $txt."Numero: <input name='num".$i."' type='text' id='num".$i."' value=".$i." readonly='readonly'><br />";
				$txt = $txt."ID SISCO: <input name='idSisco".$i."' type='text' id='idSisco".$i."' value=".$fila[2]." readonly='readonly'><br />";			
				$txt = $txt."<div>Fecha: <input name='fecha".$i."' type='text' id='fecha".$i."' value=".$fila[1]." readonly='readonly'><br />";
				$txt = $txt ."<input id='submitButton".$i."' type='submit' value='Procesada'/>";
			$txt = $txt ."</form>";
			$i = $i+1;
		}
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
	 	$objResponse->assign("submitButton","value","Actualizar");
		return $objResponse;
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function consultAsigList($formExp)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM asignaciones where statusAsig = 6";
		$result = mysql_query($query) or die("Error al realizar la consulta");
		$i=1;
		$txt= "";
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt."<br /> <hr /> <br />";
			$txt = $txt."Numero: <input name='num".$i."' type='text' id='num".$i."' value=".$i." readonly='readonly'><br />";
			$txt = $txt."ID SISCO: <input name='idSisco".$i."' type='text' id='idSisco".$i."' value=".$fila[2]." readonly='readonly'><br />";			
			$txt = $txt."<div>Fecha: <input name='fecha".$i."' type='text' id='fecha".$i."' value=".$fila[1]."><br />";
			$i = $i+1;
		}
	 	$objResponse->Assign("Resultados","innerHTML",$txt);
	 	$objResponse->assign("submitButton","value","Actualizar");
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function combCiudad($idPais)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		$query="SELECT * FROM City where CountryCode = '".$idPais."'";
		$txt = "";
		$result = mysql_query($query) or die("Error al realizar la consulta");
		$txt = $txt ."<select name='ciudad' id='ciudad'>";
		$txt = $txt ."<option value=' '> --Seleccione Ciudad-- </option>";
		while($opciones = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$txt = $txt ."<option value=".$opciones[0].">".$opciones[3]."</option>";
		}
		$txt = $txt ."</select>";
	 	$objResponse->Assign("ciudad","innerHTML",$txt);
		return $objResponse;
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: comEntrante
	Descripción:Función usada para agregar comunicaciones en la bd.
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	
	Parámetros entrada:
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function procesada($formAsig, $bandera)
	{
		$objResponse = new xajaxResponse();
		$con = conectar();
		mysql_select_db("sisco", $con);
		// Modificico el estatus de la comunicación en la tabla comunicaciones
		$query="UPDATE comunicaciones set Status = 6 where numInterno='".$formAsig['idSisco'.$bandera]."'";
		$result = mysql_query($query) or die("Error al ejecutar el query");
		$query="UPDATE asignaciones set statusAsig = 6 where numInterno='".$formAsig['idSisco'.$bandera]."'";
		$result = mysql_query($query) or die("Error al ejecutar el query");
		return $objResponse;
	}
/*--------------------------------------------------- Disparador de salida -----------------------------------------------------*/

	require("xajaxDeclaraciones.php");
	$xajax->processRequest();
?>

