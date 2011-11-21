/* “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. */

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
	document.getElementById('light').style.display='none';
}

function ingresa_bitacora(mensaje,idtrans)
{
	xajax_Bitacora(mensaje,idTrans);
}

function consulta_bitacora(campos,condicion,divResp)
{
	xajax_ConsultaBit(campos,condicion,divResp);
}

function logOut()
{
	xajax_logOut();
}

function incluir(opcion,pagina)
{
	xajax_Incluir(opcion,pagina);
}