		<div id="CasillaId">
			<p>
				<strong> Usuario: </strong> <?php echo " ".$_SESSION['usuario'] ?> <br />
				<strong> Nivel:</strong> <?php echo " ".$_SESSION['idCargo'] ?>
			</p>
		</div>
		<div id="resumenTit">
			<h2>Recibidas Pendientes:</h2>
		</div>
		<div id="resumenCont">
<?php
			include ("./funciones.php");
			$dia = date ("d/m/Y");
			$rHoy = cuenta_reg("comunicaciones","fecha ='".$dia."' && Status = 1");  //Nº comunicaciones recibidas pendientes 
			$aHoy = cuenta_reg("comunicaciones","fecha ='".$dia."' && Status = 2");  //Nº comunicaciones asignadas
			$eHoy = cuenta_reg("comunicaciones","fecha ='".$dia."' && Status = 3");  //Nº comunicaciones enviadas pendientes
			$rnHoy = cuenta_reg("comunicaciones","fecha ='".$dia."' && Status = 4"); //Nº comunicaciones recibidas respuesta neg
			$rpHoy = cuenta_reg("comunicaciones","fecha ='".$dia."' && Status = 5"); //Nº comunicaciones recibidas respuesta pos
//---------------------------------------------------------------------------------------------------------------------------------
			$trHoy = cuenta_reg("comunicaciones","Status = 1");  //Total comunicaciones recibidas pendientes 
			$taHoy = cuenta_reg("comunicaciones","Status = 2");  //Total comunicaciones asignadas
			$teHoy = cuenta_reg("comunicaciones","Status = 3");  //Total comunicaciones enviadas pendientes
			$trnHoy = cuenta_reg("comunicaciones","Status = 4"); //Total comunicaciones recibidas respuesta neg
			$trpHoy = cuenta_reg("comunicaciones","Status = 5"); //Total comunicaciones recibidas respuesta pos
			
?>
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $rHoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $trHoy[0]; ?>
			</div>
		</div>
		<br />
		<div id="resumenTit">
			<h2>Recibidas Asignadas:</h2>
		</div>
		<div id="resumenCont">
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $aHoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $taHoy[0]; ?>
			</div>
		</div>
		<br />
		<div id="resumenTit">
			<h2>Enviadas:</h2>
		</div>
		<div id="resumenCont">
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $eHoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $teHoy[0]; ?>
			</div>
		</div>
		<br />
		<div id="resumenTit">
			<h2>Respuestas Negativas:</h2>
		</div>
		<div id="resumenCont">
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $rnHoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $trnHoy[0]; ?>
			</div>
		</div>
		<br />
		<div id="resumenTit">
			<h2>Respuestas Positivas:</h2>
		</div>
		<div id="resumenCont">
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $rpHoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php  ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $trpHoy[0]; ?>
			</div>
		</div>
		<br />