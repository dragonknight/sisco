<?php 
	//session_start();
	//verificamos que el usuario que llama tenga los privilegios necesarios:
?>
	<div id="resumen">
		<div id="CasillaId">
			<p>
				Usuario:<?php echo " ".$_SESSION['usuario'] ?> <br />
				Nivel:<?php echo " ".$_SESSION['idCargo'] ?> 
			</p>
		</div>
		<div id="resumenTit">
			<h2>Resumen de Operaciones:</h2>
		</div>
		<div id="resumenFecha">
			Hoy es:
		</div>
		<script type="text/javascript">
			consultaBit('*','','resumenCont');
		</script>
		<div id="resumenCont">
		</div>
	</div>
