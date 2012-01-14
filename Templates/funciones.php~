<?php
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	Definicion de variables Globales
	--------------------------------------------------------------------------------------------------------------------------------*/
	
	$host    ='localhost';  //Nombre del servidor al que se desea conectar
	$dbname  ='sisco';  		//Nombre de la base de datos
	$userDB  ='root';			//Nombre del usuario remoto de la base de datos
	$pass    ='dr31c0';     	//De poseer una contraseóa asignada a este usuario debe ser colocada acá

	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: conectar
	Descripción: Función de Conexión a la base de datos
	Desarrollador:
	Modificado: Carlos J. Castillo N.
	
	Parámetros entrada: ---
	Salida: $conexion
	--------------------------------------------------------------------------------------------------------------------------------*/
	
	function conectar()
	{
		global $host;   
		global $dbname; 
		global $user;   
		global $pass;
		   
		$conexion = mysql_connect("localhost","root","dr31c0") or die('Error de conexión: ' . mysql_error());

		return $conexion;
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Desconectar
	Descripción: función de cierre de la Bd
	Desarrollador:
	Modificado: 
	
	Parámetros entrada:
	Salida:
	--------------------------------------------------------------------------------------------------------------------------------*/
	
	function desconectar($conexion)
	{
		mysql_close($conexion);
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: consulta
	Descripción: Función de consulta a la Bd
	Desarrollador:
	Modificado: 
	
	Parámetros entrada: $campos,$tabla,$cond,$tipo_orden
	Salida:
	--------------------------------------------------------------------------------------------------------------------------------*/

	function consulta($campos,$tabla,$cond,$tipo_orden)
	{
		
		if($cond==null)  //Si no tiene condición la consulta, es decir no necesita una clausula where
		{	
		  $query="select ".$campos." from ".$tabla." order by ".$tipo_orden." asc";
		  //echo "query ".$query;
		}
		else
		{
		  $query="select ".$campos." from ".$tabla." where ".$cond." order by ".$tipo_orden." asc";
		  //echo "query ".$query;
		}
		
		$conec = conectar();
		mysql_select_db("sisco");
		$result = mysql_query($query,$conec) or die("Error al realizar la consulta: ".mysql_error());
		$num_filas=mysql_num_rows($result);
		$num_cols=mysql_num_fields($result);
		
		while($fila = mysql_fetch_array($result,MYSQL_BOTH))
		{
			$datos[] = $fila;
		}
		
		if($num_filas>0) // si consigue datos no hay error, es decir $error=0
			$error=0;
		else
			$error=1;
		
		$salida = array ($datos, $num_filas, $num_cols, $error);
		desconectar($conec);
		
		return $salida;
	}	
	
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: consultaSimp
	Descripción: Función para la consulta de datos
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: $campos,$tabla,$cond,$tipoOrden
	Salida:
	--------------------------------------------------------------------------------------------------------------------------------*/
	function consultaSimp($campos,$tabla,$cond,$tipoOrden)
	{
		
		if($cond==null)  //Si no tiene condición la consulta, es decir no necesita una clausula where
		{	
		  $query="select ".$campos." from ".$tabla." order by ".$tipoOrden." asc";
		  //echo "query ".$query;
		}
		else
		{
		  $query="select ".$campos." from ".$tabla." where ".$cond." order by ".$tipoOrden." asc";
		  //echo "query ".$query;
		}
		
		$conec = conectar();
		mysql_select_db("sisco");
		$result = mysql_query($query,$conec) or die("Error al realizar la consulta: ". mysql_error());
		$salida = mysql_fetch_array($result);
		desconectar($conec);
		return $salida;
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: combo
	Descripción: Función para crear combobox
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	Modificado: 
	
	Parámetros entrada:
	Salida:
	--------------------------------------------------------------------------------------------------------------------------------*/
	
	function combo($campos, $tabla, $condicion, $orden ) 
	{
		//invoco la consulta para traer todos los campos de la tabla
		$consul=consulta($campos,$tabla,'',$orden);
		for ($i=0;$i<=$consul[1]-1;$i++)
		{
			echo "<option value=". $consul[0][$i][0] .">". $consul[0][$i][1] ."</option>";
		}
		
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: combo
	Descripción: Función para crear combobox
	Desarrollador: Carlos J. Castillo N. -- Castilloc185@gmail.com -- @dr4g0nkn1ght
	Modificado: 
	
	Parámetros entrada:
	Salida:
	--------------------------------------------------------------------------------------------------------------------------------*/
	
	function comboPersonas($campos, $tabla, $condicion, $orden) 
	{
		//invoco la consulta para traer todos los campos de la tabla
		$consul=consulta($campos,$tabla,'',$orden);
		for ($i=0;$i<=$consul[1]-1;$i++)
		{
			echo "<option value=". $consul[0][$i][0] .">". $consul[0][$i][1] . ", ". $consul[0][$i][2] . ", ". $consul[0][$i][0] . "</option>";
		}
		
	}
?>