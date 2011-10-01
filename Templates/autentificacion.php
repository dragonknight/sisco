<div id="Notificación">
	Has ingresado al área de autenticación de la Plataforma.
	Por favor introduzca sus credenciales para continuar:
</div>
<div id="formLogin">
	<form id="autentif">
		<div id="datLogin">
			Usuario: <input type="text" name="login" id="login" value="" size="20">
			Contraseña: <input type="password" name="password" id="password" value="" size="20">
		</div>
		<input type="button" value="Ingresar" onclick="xajax_Login(xajax.getFormValues('autentif'))">
	</form>
</div>
<div id="Error">
</div>