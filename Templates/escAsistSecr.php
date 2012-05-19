		<div id="CasillaId">
			<p>
				<strong> Usuario: </strong> <?php echo " ".$_SESSION['usuario'] ?> <br />
				<strong> Nivel:</strong> <?php echo " ".$_SESSION['idCargo'] ?>
			</p>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Operaciones:</h2>
		</div>
		<div id="resumenCont">
			<h4>Comunicaciones Recibidas:</h4><br />
<?php
				include ("./funciones.php");
				$estandar = cuenta_reg('comunicaciones','tDirec = \'Entrante\' && tCom = \'Estandar\' ');
				$gacetas = cuenta_reg('comunicaciones','tDirec = \'Entrante\' && tCom = \'Gaceta\' ');
				$audiencias = cuenta_reg('comunicaciones','tDirec = \'Entrante\' && tCom = \'Audiencia\' ');
				$invitaciones = cuenta_reg('comunicaciones','tDirec = \'Entrante\' && tCom = \'Invitación\' ');
				$denuncias = cuenta_reg('comunicaciones','tDirec = \'Entrante\' && tCom = \'Denuncia\' ');
				$total = cuenta_reg('comunicaciones','tDirec = \'Entrante\'');
				
?>
			<div id="rCol1">
				<strong> Estandar: </strong><br />
				<?php echo $estandar[0]; ?><br /><br /> 
				<strong> Denuncia: </strong><br />
				<?php echo $denuncias[0]; ?><br /><br />
			</div>
			<div id="rCol2">
				<strong> Gaceta: </strong><br />
				<?php echo $gacetas[0]; ?><br /><br /><br /><br /><br />
			</div>
			<div id="rCol3">
				<strong> Audiencia: </strong><br />
				<?php echo $audiencias[0]; ?><br /><br /><br /><br /><br />
			</div>
			<div id="rCol4">
				<strong> Invitación: </strong><br />
				<?php echo $invitaciones[0]; ?><br /><br /><br /><br /><br />
				<hr>
				<strong> Total: </strong><br />
				<?php echo $total[0]; ?><br /><br />
			</div>
		</div>