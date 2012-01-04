<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php");
?>
	<div id="formUser">
		<h3>Registrar Comunicación Entrante</h3><br>
		<select id="tComunicacion" name="tComunicacion" onchange="muestraFormComunicacion(this)">
			<option value=""> -- Seleccione Tipo Comunicación -- </option>
			<option value="1"> Comunicación Estandar </option>
			<option value="2"> Gaceta </option>
			<option value="3"> Audiencia </option>
			<option value="4"> Invitación </option>
			<option value="5"> Denuncia </option>
		</select><br /><br />
		<div id="cEstandar" style="display:none">
			<strong>Comunicación Estandar</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<strong>Datos de la Comunicación</strong><br /><br />
				Nº Interno para la comunicación: <br /><br />
				Nº Comunicación<br /><br />
				Fecha:<br /><br />
				Sintesis:<br /><br />
				Caracter:<br /><br />
				Prioridad:<br /><br />
				Resumen:<br /><br />
				Procedencia de la comunicación:<br /><br />
				<select id="cTipPersona" name="cTipPersona" onchange="muestraTipPersona(this)">
					<option value=""> -- Seleccione Tipo de Persona -- </option>
					<option value="1"> Persona Natural </option>
					<option value="2"> Persona no Natural </option>
				</select><br /><br />
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
			</form>
		</div>
		<div id="Gaceta" style="display:none">
			<strong>Comunicación por Gaceta</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<?php
					gaceta();
				?>
			</form>
		</div>
		<div id="Audiencia" style="display:none">
			<strong>Comunicación para Audiencia</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<strong>Datos de la Solicitud</strong><br /><br />
				Nº Interno para la comunicación: <br /><br />
				Nº Comunicación (Si la Hay):<br /><br />
				Fecha:<br /><br />
				Sintesis:<br /><br />
				Caracter:<br /><br />
				Prioridad:<br /><br />
				Resumen:<br /><br />
				Procedencia de la comunicación:<br /><br />
				<select id="cTipPersona" name="cTipPersona" onchange="muestraTipPersona(this)">
					<option value=""> -- Seleccione Tipo de Persona -- </option>
					<option value="1"> Persona Natural </option>
					<option value="2"> Persona no Natural </option>
				</select><br /><br />
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
			</form>
		</div>
		<div id="Invitacion" style="display:none">
			<strong>Invitación</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<?php
					invitacion();
				?>
				Procedencia de la comunicación:<br /><br />
				<?php tpersona(); ?>
			</form>
		</div>
		<div id="Denuncia" style="display:none">
			<strong>Denuncia</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<?php
					denuncia();
				?>
				<?php tpersona(); ?>
			</form>
		</div>
		<div id="Error">
		</div>
	</div>