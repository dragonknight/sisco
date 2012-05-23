/* “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. */

function autenticar()
{
	xajax.$('submitButton').disabled=true;
	xajax.$('submitButton').value="Espere";
	xajax_Login(xajax.getFormValues("autentif"));
	return false;
}

function ingUser()
{
	xajax.$('submitButton').disabled=true;
	xajax.$('submitButton').value="Ingresando Datos, Espere";
	xajax_guardaUsuario(xajax.getFormValues("formIngUser"));
	return false;
}

function comEntrante()
{
	xajax.$('submitButton').disabled=true;
	xajax.$('submitButton').value="Espere";
	xajax_comEntrante(xajax.getFormValues("comEntrante"));
	return false;
}
		
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

function limpiaError()
{
	document.getElementById('Error').style.display='none';
}

function ingresa_bitacora(mensaje,idtrans)
{
	xajax_Bitacora(mensaje,idTrans);
}

function consulta_bitacora()
{
	xajax_ConsultaBit();
}

function logOut()
{
	xajax_logOut();
}

function incluir(opcion,pagina)
{
	xajax_Incluir(opcion,pagina);
}
function validaTextComp(campo,valor)
{
	xajax_ValidaTextComp(campo,valor);
}
function validaNumeros(campo,valor)
{
	xajax_ValidaNumeros(campo,valor);
}
function validaUsuario(campo,valor)
{
	xajax_ValidaUsuario(campo,valor);
}
function validaContra(campo,valor)
{
	xajax_ValidaContra(campo,valor);
}
function validaEmail(campo,valor)
{
	xajax_ValidaEmail(campo,valor);
}
function validaCedula(campo,valor)
{
	xajax_ValidaCedula(campo,valor);
}
function buscaComu()
{
	xajax_buscaComu(xajax.getFormValues("comunic"));
}
function buscaExp()
{
	xajax_buscaExp(xajax.getFormValues("expediente"));
}
function buscaXAsig()
{
	xajax_buscaXAsig(xajax.getFormValues("asignar"));
}
function activaCombAsig(valor, indice) 
{
	alert(valor);
	alert(indice);
	if(valor=="A") 
	{
		alert("Seleccione el Usuario");
		document.getElementById('funcionario'+indice).disabled=false;
		document.getElementById('submitButton'+indice).disabled=false;
		xajax.$('submitButton'+indice).value="Asignar";
	}
	else
	{
		alert("La comunicación sera marcada como procesada");
		document.getElementById('funcionario'+indice).disabled=true;
		document.getElementById('submitButton'+indice).disabled=false;
		xajax.$('submitButton'+indice).value="Procesada";
	}
}
function asignar(indice)
{
	alert("Se procesara el formulario, "+indice);
	xajax_Asigna(xajax.getFormValues(indice));
	return false;
}