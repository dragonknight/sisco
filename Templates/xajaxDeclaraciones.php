<?php
	require_once("../Libs/xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax("xajaxFunciones.php");
	$xajax->registerFunction("CambiaPagina");
	$xajax->registerFunction("Login");
	$xajax->registerFunction("logOut");
	$xajax->registerFunction("Bitacora");
	$xajax->registerFunction("ValidaTextSimp");
	$xajax->registerFunction("ValidaTextComp");
	$xajax->registerFunction("ValidaNumeros");
	$xajax->registerFunction("ValidaEmail");
	$xajax->registerFunction("ValidaCedula");
	$xajax->registerFunction("guardaUsuario");
	$xajax->registerFunction("comEntrante");
?>
