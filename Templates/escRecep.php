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
				$hoy = cuenta_reg('comunicaciones','*','TDirec = \'E\''); //La condicion es que Tdirec = E && fecha = hoy
				$semana = cuenta_reg('comunicaciones','*','TDirec = \'E\''); //La condicion es que Tdirec = E && fecha = hoy
				$mes = cuenta_reg('comunicaciones','*','TDirec = \'E\''); //La condicion es que Tdirec = E && fecha = hoy
				$total = cuenta_reg('comunicaciones','*','TDirec = \'E\''); //La condicion es que Tdirec = E
				
?>
			<div id="rCol1">
				<strong> Hoy: </strong><br />
				<?php echo $hoy[0]; ?>
			</div>
			<div id="rCol2">
				<strong> Semana: </strong><br />
				<?php echo $semana[0]; ?>
			</div>
			<div id="rCol3">
				<strong> Mes: </strong><br />
				<?php echo $mes[0]; ?>
			</div>
			<div id="rCol4">
				<strong> Total: </strong><br />
				<?php echo $total[0]; ?>
			</div>
		</div>