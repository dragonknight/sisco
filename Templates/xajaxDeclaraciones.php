<?php
	require_once("../Libs/xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax("xajaxFunciones.php");
	$xajax->registerFunction("CambiaPagina");
	$xajax->registerFunction("Login");
?>