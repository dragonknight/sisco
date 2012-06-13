<?php
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function tpersona()
	{
?>
		<select id="cTipPersona" name="cTipPersona" onchange="muestraTipPersona(this)">
			<option value=""> -- Seleccione Tipo de Persona -- </option>
			<option value="1"> Persona Natural </option>
			<option value="2"> Persona no Natural </option>
		</select><br /><br />
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function perNatural()
	{
?>
		<div id="perNatural" style="display:none">
			<strong>Persona Natural</strong><br />
				<?php combPersonas(); // llamo a la función local que arma el combo con las personas ?> 
				<div id="nvaPersona" style="display:none">
				<?php
					persona();
				?>
					<br>
				<?php
					direccion();
				?>
				</div>
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 

	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/	
	function perNoNatural()
	{
?>
		<div id="perNoNatural" style="display:none">
			<strong>Persona No Natural</strong><br />
				<?php combPersonasNoNat(); ?>
				<div id="nvaPersonaNoNat" style="display:none">
					<?php
						ente();
					?>
						<br>
					<?php
						direccion();
					?>
				</div>
		</div>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/

	function combPersonas()
	{
?>
		<select id="comboPersonas" name="comboPersonas" onchange="muestraFormPersona(this)">
			<option value=""> -- Seleccione Persona o Agrege Nueva -- </option>
			<option value="0"> -- Agregar Nueva -- </option>
			<?php comboPersonas('*','personas','','cedula'); ?>
		</select>
		<br />
		<br />
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: tpersona
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function combPersonasNoNat()
	{
?>
		<select id="comboPersonasNoNat" name="comboPersonasNoNat" onchange="muestraFormPersonaNoNat(this)">
			<option value=""> -- Seleccione Persona o Agrege Nueva -- </option>
			<option value="0"> -- Agregar Nueva -- </option>
			<?php comboPersonasNoNat('*','noNat','','id'); ?>
		</select>
		<br />
		<br />
<?php
	}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: combPrioridad
	Descripción: Funcion que Muestra el Combo de las Prioridades
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function combPrioridad()
	{
?>
		<select id="Prioridad" name="Prioridad">
			<option value=""> -- Seleccione -- </option>
			<option value="1"> Alto </option>	
			<option value="2"> Medio </option>
			<option value="3"> Bajo </option>
		</select>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function caracterCom()
	{
?>
		<select id="Caracter" name="Caracter">
			<option value=""> -- Seleccione -- </option>
			<?php combo('*','caracterCom','','id'); ?>
		</select>
<?php
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function Direcc( $tCom, $inic, $direc, $inicD)
	{
		$comunicacion = cuenta_reg("comunicaciones", "tCom = '".$tCom."' && tDirec = '".$direc."'");
		$comunicacion = $comunicacion[0]+1;
?>
		<strong>Datos de la Comunicación</strong><br /><br />
		Tipo Comunicación: <?php echo '<input name="tipCom" type="text" id="tipCom" value="'.$tCom.'" size"5" readonly="readonly">'; ?> <br /><br />
		Direccionalidad: <?php echo '<input name="Via" type="text" id="Via" value="'.$direc.'" size"5" readonly="readonly">'; ?> <br /><br />
		Nº Interno para la comunicación: <?php echo '<input name="numInterno" type="text" id="numInterno" value="SG-'.$inicD.'-'.$inic.'-2012-' .$comunicacion.'" size"5" readonly="readonly"> '; ?> <br /><br />
		<hr>
<?php
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function cEstandar($tCom, $inic, $direc, $inicD)
	{
		Direcc($tCom, $inic, $direc, $inicD);
?>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			Procedencia de la comunicación:<br /><br />
			<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		else
		{
		?>
			Destinatario de la comunicación:<br /><br />
		<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		?>
		<hr>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			<div id="rCol1">
				Nº Comunicación<br />
			</div>
			<div id="rCol2">
				<input type="text" name="NumCom" id="NumCom" value="" size="20" /><br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Fecha" id="Fecha" size="20" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" /><br />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" /><br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?>
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?>
			</div><br />
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /><br />
			</div>
		<?php 
		}
		else 
		{
		?>
			<div id="rCol1">
				Fecha:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Fecha" id="Fecha" size="20" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" /><br />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" /><br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?>
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?>
			</div><br />
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /><br />
			</div>		
<?php
		}
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: gacetas
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function gaceta($tCom, $inic, $direc, $inicD)
	{
		Direcc($tCom, $inic, $direc, $inicD);
?>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			Procedencia de la comunicación:<br /><br />
			<?php 
				combPersonasNoNat();
		}
		else
		{
		?>
			Destinatario de la comunicación:<br /><br />
		<?php 
				combPersonasNoNat();
		}
		?>
		 <div id="nvaPersonaNoNat" style="display:none">
			<?php
				ente();
			?>
				<br>
			<?php
				direccion();
			?>
		</div>
		<br>
		<hr>
		<br>
		<?php
		if ($direc=="Entrante")
		{
		?>
			<div id="rCol1">
				Nº Comunicación<br />
			</div>
			<div id="rCol2">
				<input type="text" name="NumCom" id="NumCom" value="" size="20" /><br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">	
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" /><br />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="" id="" value="" size="20" onchange="validaTextComp(this.id, this.value )" /><br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				<br />
			</div>
			<div id="rCol4">
				<br />
			</div>
		<?php
		}
		else 
		{
		?>
			<div id="rCol1">
				Fecha:<br />
			</div>
			<div id="rCol2">	
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" /><br />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="" id="" value="" size="20" onchange="validaTextComp(this.id, this.value )" /><br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				<br />
			</div>
			<div id="rCol4">
				<br />
			</div>
<?php
		}
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: audiencia
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function audiencia($tCom, $inic, $direc, $inicD)
	{
		Direcc($tCom, $inic, $direc, $inicD);
?>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			Procedencia de la comunicación:<br /><br />
			<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		else
		{
		?>
			Destinatario de la comunicación:<br /><br />
		<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		?>
		<hr>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			<div id="rCol1">
				Nº Comunicación: <br />
			</div>
			<div id="rCol2">
				<input type="text" name="NumCom" id="" size="20" /> <br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">	
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<br />
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?>
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
		<?php
		}
		else 
		{
		?>
			<div id="rCol1">
				Fecha:<br />
			</div>
			<div id="rCol2">	
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<br />
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?>
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
<?php
		}
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: invitacion
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function invitacion($tCom, $inic, $direc, $inicD)
	{
		Direcc($tCom, $inic, $direc, $inicD);
?>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			Procedencia de la comunicación:<br /><br />
			<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		else
		{
		?>
			Destinatario de la comunicación:<br /><br />
		<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		?>
		<hr>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			<div id="rCol1">
				Nº Comunicación<br />
			</div>
			<div id="rCol2">
				<input type="text" name="NumCom" id="NumCom" value="" size="20" /> <br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">		
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="Indique aquí todos los datos de la Invitación" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
		<?php
		}
		else 
		{
		?>
			<div id="rCol1">
				Nº Comunicación<br />
			</div>
			<div id="rCol2">
				<input type="text" name="NumCom" id="NumCom" value="" size="20" /> <br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">		
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="Sintesis" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen:<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="Indique aquí todos los datos de la Invitación" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
<?php
		}
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: cEstandar
	Descripción: Función que llama a las entidades Persona Natural y no Natural
	Desarrollador: Carlos J. Castillo N.
	Modificado: 
	
	Parámetros entrada: ---
	Salida: $conexion
--------------------------------------------------------------------------------------------------------------------------------*/
	function denuncia($tCom, $inic, $direc, $inicD)
	{
		Direcc($tCom, $inic, $direc, $inicD);
?>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			Procedencia de la comunicación:<br /><br />
			<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		else
		{
		?>
			Destinatario de la comunicación:<br /><br />
		<?php 
				tpersona();
				perNatural();
				perNoNatural();
		}
		?>
		<hr>
		<br />
		<?php
		if ($direc=="Entrante")
		{
		?>
			<div id="rCol1">
				Nº Comunicación<br />
			</div>
			<div id="rCol2">
				<input type="text" value="Si la hay" name="NumCom" id="NumCom" value="" size="20" /> <br />
			</div>
			<div id="rCol3">
				Fecha:<br />
			</div>
			<div id="rCol4">		
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="" value="Sintesis" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen: (Relate acá todos los hechos)<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
		<?php
		}
		else 
		{
		?>
			<div id="rCol1">
				Fecha:<br />
			</div>
			<div id="rCol2">		
				<input type="text" name="Fecha" id="Fecha" value="<?php echo date ("d/m/Y"); ?>" readonly="readonly" size="20" />
			</div>
			<div id="rCol1">
				Sintesis:<br />
			</div>
			<div id="rCol2">
				<input type="text" name="Sintesis" id="" value="Sintesis" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
			<div id="rCol3">
				Caracter:<br />
			</div>
			<div id="rCol4">
				<!-- Combo Caracter -->
				<?php caracterCom(); ?><br />
			</div>
			<div id="rCol1">
				Prioridad:<br />
			</div>
			<div id="rCol2">
				<!-- Combo Prioridades -->
				<?php combPrioridad(); ?><br />
			</div>
			<div id="rCol3">
				Resumen: (Relate acá todos los hechos)<br />
			</div>
			<div id="rCol4">
				<input type="text" name="Resumen" id="Resumen" value="" size="20" onchange="validaTextComp(this.id, this.value )" /> <br />
			</div>
<?php
		}
	}
?>