function llamar_codigo(archivo,id_capa)
{
	xajax_CambiaPagina(archivo,id_capa);
}
function modal()
{
	document.getElementById('fade').style.display='block';
	document.getElementById('light').style.display='block';				
}
function actuaLogin()
{
	document.getElementById('fade').style.display='none';
	llamar_codigo('menuAutentif.php','Menu');
	llamar_codigo('escritorios.php','Contenido');
	document.getElementById('light').style.display='none';
}
function bitacora(mensaje,idtrans)
{
	xajax_Bitacora(mensaje,idTrans);
}
function consultaBit(campos,condicion,divResp)
{
	xajax_ConsultaBit(campos,condicion,divResp);
}
