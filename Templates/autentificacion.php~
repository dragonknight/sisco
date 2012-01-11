<!-- “This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA.“. -->
<?php 
	session_start();
?>
<div id="Notificación">
	Has ingresado al área de autenticación de la Plataforma.
	Por favor introduzca sus credenciales para continuar:
</div>
<div id="formLogin">
	<form id="autentif" action="javascript:void(null);" onsubmit="autenticar();">
		<div id="datLogin">
			Usuario: <input type="text" name="login" id="login" value="" size="20" onchange="javascript:limpiaError()"> <br /> <!-- El evento onfocus limpia los mensajes de error (si hay alguno) -->
			Contraseña: <input type="password" name="password" id="password" value="" size="20" onchange="javascript:limpiaError()"> <!-- El evento onfocus limpia los mensajes de error (si hay alguno) -->
		</div>
		<input id="submitButton" type="submit" value="ingresar"/>
	</form>
</div>
<div id="Error">
</div>
