<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
<?php
	session_start();
	//verificamos que el usuario que llama tenga los privilegios necesarios:
	if($_SESSION['idCargo']=='0')
	{
?>

		<div id="CasillaId">
			<p>
				<strong> Usuario: </strong> <?php echo " ".$_SESSION['usuario'] ?> <br />
				<strong> Nivel:</strong> <?php echo " ".$_SESSION['idCargo'] ?> 
			</p>
		</div>
		<div id="resumenTit">
			<h2>Log General del Sistema:</h2>
		</div>
		<div id="resumenCont">
			<h4>Log General del sistema:</h4>
<?php
				include ("./funciones.php");
				$resumen = consulta('*','bitacora','','idTransaccion');
				$i = $resumen[1]-1;
?>
			<div id="izq">
				<?php echo 'Número de entradas en el log: '. $resumen[1] . '<br /><br />'; ?>
			</div>
			<div id="bitCol1">
				<strong> Nº: </strong><br />
			</div>
			<div id="bitCol2">
				<strong> Tipo: </strong><br />
			</div>
			<div id="bitCol3">
				<strong> Detalle: </strong><br />
			</div>
			<div id="bitCol4">
				<strong> IP: </strong><br />
			</div>
			<div id="bitCol5">
				<strong> Fecha: </strong><br />
			</div>
<?php
			foreach($resumen[0][0][0] as $entrada)
			{
				echo ' <div id="bitCol1"> ';
				echo 		$resumen[0][$i][0];
				echo '</div>';
				echo ' <div id="bitCol2"> ';
				echo 		$resumen[0][$i][1];
				echo '</div>';
				echo ' <div id="bitCol3"> ';
				echo 		$resumen[0][$i][2];
				echo '</div>';
				echo ' <div id="bitCol4"> ';
				echo 		$resumen[0][$i][3];
				echo '</div>';
				echo ' <div id="bitCol5"> ';
				echo 		$resumen[0][$i][4];
				echo '</div>';
				$i= $i-1;
			}
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