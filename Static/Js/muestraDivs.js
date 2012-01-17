/*-------------------------------------------------------------------------------------------------------------------------------- 
	funcion muestraFormPersona 
	Descripción:Función que permite seleccionar que divs del formulario mostrar en base a la selección de tipo de comunicación
	Desarrollador: Mauro Rondinelli (www.elguruprogramador.com.ar/articulos/mostrar-y-ocultar-disv.htm) 
	Modificado: Carlos J. Castillo (castilloc185@gmail.com
	
	Parámetros entrada: elemento
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/

/* Función para mostrar u ocultar el formulario para personas*/

function muestraFormPersona(valor) 
{
	if(valor.value=="0") 
	{
		document.getElementById("nvaPersona").style.display = "block"; 
	} 
	else
	{
		document.getElementById("nvaPersona").style.display = "none";
	} 
	 
}

function muestraFormPersonaNoNat(valor) 
{
	if(valor.value=="0") 
	{
		document.getElementById("nvaPersonaNoNat").style.display = "block"; 
	} 
	else
	{
		document.getElementById("nvaPersonaNoNat").style.display = "none";
	} 
	 
}

function muestraFormComunicacion(valor)
{
	if(valor.value=="1") //Comunicacion Estandar
	{
		document.getElementById("cEstandar").style.display = "block";
		document.getElementById("Gaceta").style.display = "none";
		document.getElementById("Audiencia").style.display = "none";
		document.getElementById("Invitacion").style.display = "none";
		document.getElementById("Denuncia").style.display = "none";
	} 
	else 
	{
		if(valor.value=="2") //Gacetas
		{
			document.getElementById("cEstandar").style.display = "none";
			document.getElementById("Gaceta").style.display = "block";
			document.getElementById("Audiencia").style.display = "none";
			document.getElementById("Invitacion").style.display = "none";
			document.getElementById("Denuncia").style.display = "none";
		}
		else
		{
			if(valor.value=="3") //Audiencias
			{
				document.getElementById("cEstandar").style.display = "none";
				document.getElementById("Gaceta").style.display = "none";
				document.getElementById("Audiencia").style.display = "block";
				document.getElementById("Invitacion").style.display = "none";
				document.getElementById("Denuncia").style.display = "none";
			}
			else
			{
				if(valor.value=="4") //Invitaciones
				{
					document.getElementById("cEstandar").style.display = "none";
					document.getElementById("Gaceta").style.display = "none";
					document.getElementById("Audiencia").style.display = "none";
					document.getElementById("Invitacion").style.display = "block";
					document.getElementById("Denuncia").style.display = "none";
				}
				else //Denuncias
				{
					if(valor.value=="5")
					{
						document.getElementById("cEstandar").style.display = "none";
						document.getElementById("Gaceta").style.display = "none";
						document.getElementById("Audiencia").style.display = "none";
						document.getElementById("Invitacion").style.display = "none";
						document.getElementById("Denuncia").style.display = "block";
					}
					else
					{
						document.getElementById("cEstandar").style.display = "none";
						document.getElementById("Gaceta").style.display = "none";
						document.getElementById("Audiencia").style.display = "none";
						document.getElementById("Invitacion").style.display = "none";
						document.getElementById("Denuncia").style.display = "none";
					}
				}
			}
		}
	}  
}

function muestraTipPersona(valor) 
{
	if(valor.value=="1") 
	{
		document.getElementById("perNatural").style.display = "block"; 
		document.getElementById("perNoNatural").style.display = "none";
	} 
	else
	{
		if(valor.value=="2")
		{
			document.getElementById("perNatural").style.display = "none";
			document.getElementById("perNoNatural").style.display = "block";
		}
		else
		{
			document.getElementById("perNatural").style.display = "none";
			document.getElementById("perNoNatural").style.display = "none";
		}
	} 
	 
}