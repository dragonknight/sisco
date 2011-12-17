<?php
	include ("./entidades.php");
	include ("./funciones.php");
	include ("./plantillas.php");
?>
	<div id="formUser">
		<h3>Registrar Comunicación Entrante</h3><br>
		<select id="tComunicacion" name="tComunicacion" onchange="muestraFormComunicacion(this)"> <!-- hay que agregar el evento onchange="funcion()" para el combo ciudad -->
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
				<?php
					cEstandar();
				?>
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
				<?php
					audiencia();
				?>
			</form>
		</div>
		<div id="Invitacion" style="display:none">
			<strong>Invitación</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<?php
					invitacion();
				?>
			</form>
		</div>
		<div id="Denuncia" style="display:none">
			<strong>Denuncia</strong>
			<form id="comEntrante" action="javascript:void(null);" onsubmit="comEntrante();">
				<?php
					denuncia();
					tpersona();
				?>
			</form>
		</div>
		<div id="Error">
		</div>
	</div>