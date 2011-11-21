<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
<?php 
	//verificamos que el usuario que llama tenga los privilegios necesarios:
	if($_SESSION['idCargo']=='0')
	{
?>

		<div id="CasillaId">
			<p>
				Usuario:<?php echo " ".$_SESSION['usuario'] ?> <br />
				Nivel:<?php echo " ".$_SESSION['idCargo'] ?> 
			</p>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Operaciones:</h2>
		</div>
		<div id="resumenCont">
			<?php
				include ("./logBitacora.php");
				bitTacoraCompleta();
			?>
		</div>
<?php
	}
	else 
	{
		// si no posee los privilegios necesarios, alertamos un intento de escalada de privilegios de un usuario debidamente logeado:
?>
		<script type="text/javascript"> 
			xajax_Bitacora('Intento de escalar privilegios','7'); //alternativamente podemos colocar language="JavaScript"
		</script> 
		<p>
			Error, la pagina que ha solicitado no esta disponible para su nivel de acceso, <br />
			Este incidente ha sido reportado al administrador del sistema...
		</p>
<?php
	}
?>
