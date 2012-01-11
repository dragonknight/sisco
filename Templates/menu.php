<?php

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú no autentificado
	Descripción: Función que muestra el menú de usuario previa autenticación en el sistema.
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function menuNoAutent()
		{
	
			echo '
					<div id="ddtopmenubar" class="mattblackmenu">
						<ul>
							<li><a href="javascript:llamar_codigo(\'principal.php\', \'Contenido\')">Principal</a></li>
							<li><a href="javascript:llamar_codigo(\'autentificacion.php\', \'Contenido\')">Ingresar</a></li>
							<li><a href="javascript:llamar_codigo(\'Desarrolladores.php\', \'Contenido\')">Desarrolladores</a></li>
						</ul>
					</div>
			';
		}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú administrador
	Descripción: Función que muestra el menú del usuario Administrador (previa autenticación en el sistema).
	Desarrollador: Carlos Castillo, menu extraido de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function menuAdministrador()
	{

		echo '
				<div id="ddtopmenubar" class="mattblackmenu">
					<ul>
						<li><a href="Autentificado.php" target="contenido">Principal</a></li>	
						<li><a href="#" rel="ddsubmenu1">Logs</a></li>
						<li><a href="#" rel="ddsubmenu2">Usuarios</a></li>
						<li><a href="javascript:logOut()">Salir</a></li>
					</ul>
				</div>
				<!--Top Drop Down Menu 1 HTML-->						
				<ul id="ddsubmenu1" class="ddsubmenustyle">
					<li><a href="javascript:llamar_codigo(\'logGeneral.php\', \'Contenido\')">General</a></li>
					<li><a href="javascript:llamar_codigo(\'logUsuario.php\', \'Contenido\')">Por Usuario</a></li>
					<li><a href="javascript:llamar_codigo(\'logFecha.php\', \'Contenido\')">Por Fecha</a></li>
					<li><a href="javascript:llamar_codigo(\'logEvento.php\', \'Contenido\')">Por tipo de Evento</a></li>
				</ul>
				<!--Top Drop Down Menu 2 HTML-->						
				<ul id="ddsubmenu2" class="ddsubmenustyle">
					<li><a href="javascript:llamar_codigo(\'usuario.php\', \'Contenido\')">Crear Nuevo</a></li>
					<li><a href="javascript:llamar_codigo(\'usuario.php\', \'Contenido\')">Editar Existente</a></li>
					<li><a href="javascript:llamar_codigo(\'usuario.php\', \'Contenido\')">Desactivar Usuario</a></li>
					<li><a href="javascript:llamar_codigo(\'usuario.php\', \'Contenido\')">Buscar</a></li>
				</ul>
		';
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú Recepcionista
	Descripción: Función que muestra el menú de usuario con acceso recepcionista.
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function menuRecepcionista()
	{

		echo '
						<div id="ddtopmenubar" class="mattblackmenu">
							<ul>
								<li><a href="Autentificado.php" target="contenido">Principal</a></li>
								<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
								<li><a href="javascript:logOut()">Salir</a></li>
							</ul>
						</div>
					
						<!--Top Drop Down Menu 1 HTML-->						
						<ul id="ddsubmenu1" class="ddsubmenustyle">
							<li><a href="javascript:llamar_codigo(\'cEstandar.php\', \'Contenido\')">Comunicación Estandar</a></li>
							<li><a href="javascript:llamar_codigo(\'gaceta.php\', \'Contenido\')">Gacetas</a></li>
							<li><a href="javascript:llamar_codigo(\'audiencia.php\', \'Contenido\')">Audiencias</a></li>
							<li><a href="javascript:llamar_codigo(\'invitacion.php\', \'Contenido\')">Invitaciones</a></li>
							<li><a href="javascript:llamar_codigo(\'denuncia.php\', \'Contenido\')">Denuncias</a></li>
							<li><a href="javascript:llamar_codigo(\'buscar.php\', \'Contenido\')">Buscar</a></li>							
						</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú completo
	Descripción:Función que muestra el menú de usuario completo en el sistema (secretario general o coordinadora).
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuCompleto()
	{

		echo '
				<div id="ddtopmenubar" class="mattblackmenu">
					<ul>
						<li><a href="../Paginas/centroAuten.php" target="contenido">Principal</a></li>
						<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
						<li><a href="#" rel="ddsubmenu2">Status</a></li>
						<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
						<!--  <li><a href="#" rel="ddsubmenu4">Reportes y Estadísticas</a></li>-->
						<li><a href="#" rel="ddsubmenu5">Usuarios</a></li>
						<li><a href="../Paginas/logout.php" target="contenido">Salir</a></li>
					</ul>
				</div>
			
				<!--Top Drop Down Menu 1 HTML-->						
				<ul id="ddsubmenu1" class="ddsubmenustyle">
					
					<li><a href="#">Entrantes:</a>
						<ul>
							<li><a href="../Paginas/entrantes.php" target="contenido">Nueva Comunicación</a></li>
							<li><a href="../Paginas/.php" target="contenido">Respuesta</a></li>
						</ul>
					</li>
					<li><a href="../Paginas/salientes.php" target="contenido">Saliente</a></li>
				</ul>
				
				<!--Top Drop Down Menu 2 HTML-->						
				<ul id="ddsubmenu2" class="ddsubmenustyle">
					<li><a href="#">Pendientes</a>
						<ul>
							<li><a href="../Paginas/asignar.php" target="contenido">Por Asignar</a></li>
							<li><a href="../Paginas/asignarResp.php" target="contenido">Respuestas</a></li>
						</ul>
					</li>
					<li><a href="../Paginas/finalizar.php" target="contenido">Finalizar Correspondencia</a></li>
					<li><a href="../Paginas/standby.php" target="contenido">Poner en StandBy</a></li>
					<li><a href="#">Audiencias</a>
						<ul>
							<li><a href="../Paginas/audienciasFechas.php" target="contenido">Concertar Fecha</a></li>
							<li><a href="../Paginas/audienciasResumen.php" target="contenido">Cargar Directriz PostAudiencia</a></li>
						</ul>								
					</li>
				</ul>
				
				<!--Top Drop Down Menu 3 HTML-->		
				<ul id="ddsubmenu3" class="ddsubmenustyle">
					<li><a href="../Paginas/Expediente.php" target="contenido">Expediente</a></li>
					<li><a href="#">Buscar Comunicacion</a>
						<ul>
							<li><a href="../Paginas/busquedas.php" target="contenido">Por Tipo</a></li>
							<li><a href="../Paginas/busquedas.php" target="contenido">Por Remitente</a></li>
							<li><a href="../Paginas/busquedas.php" target="contenido">Por Destinatario</a></li>
							<li><a href="../Paginas/busquedas.php" target="contenido">Por Nivel de Prioridad</a></li>
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 4 HTML-->		
				<ul id="ddsubmenu4" class="ddsubmenustyle">
					<li><a href="#">Alertas</a>
						<ul>
							<li><a href="../Paginas/aInvitaciones.php" target="contenido">Invitaciones</a></li>
							<li><a href="../Paginas/aGacetas.php" target="contenido">Gacetas</a></li>
							<li><a href="../Paginas/aAudiencias.php" target="contenido">Audiencias</a></li>
							<li><a href="../Paginas/aDenuncias.php" target="contenido">Denuncias</a></li>
						</ul>
					</li>
					<li><a href="#">Consolidados</a>
						<ul>
							<li><a href="../Paginas/.php" target="contenido">Diario</a></li>
							<li><a href="../Paginas/.php" target="contenido">Mensual</a></li>
						</ul>
					</li>
					<li><a href="#">Informes</a>
						<ul>
							<li><a href="../Paginas/.php" target="contenido">Expediente de Denuncias</a></li>
							<li><a href="../Paginas/.php" target="contenido">Origen de las Comunicaciones</a></li>
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 5 HTML-->						
				<ul id="ddsubmenu5" class="ddsubmenustyle">
					<li><a href="../Paginas/.php" target="contenido">Ingresar Nuevo</a></li>
					<li><a href="../Paginas/.php" target="contenido">Modificar Existente</a></li>
					<li><a href="../Paginas/.php" target="contenido">Eliminar</a></li>
					<li><a href="../Paginas/busquedas.php" target="contenido">Buscar</a></li>
				</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú Asistente o secretaria
	Descripción:Función que muestra el menú de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuAsistSecr()
	{

		echo '
							<div id="ddtopmenubar" class="mattblackmenu">
								<ul>
									<li><a href="../Paginas/centroAuten.php" target="contenido">Principal</a></li>
									<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
									<li><a href="#" rel="ddsubmenu2">Asignaciones</a></li>
									<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
									<!--  <li><a href="#" rel="ddsubmenu4">Reportes y Estadísticas</a></li>-->
									<li><a href="../Paginas/logout.php" target="contenido">Salir</a></li>
								</ul>
							</div>
								
								<li><a href="#">Entrantes:</a>
									<ul>
										<li><a href="../Paginas/entrantes.php" target="contenido">Nueva Comunicación</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuesta</a></li>
									</ul>
								</li>
								<li><a href="../Paginas/salientes.php" target="contenido">Saliente</a></li>
							</ul>
							
							<!--Top Drop Down Menu 2 HTML-->						
							<ul id="ddsubmenu2" class="ddsubmenustyle">
								<li><a href="#">Pendientes</a>
									<ul>
										<li><a href="../Paginas/CheckAsignaciones.php" target="contenido">Asignaciones</a></li>
									</ul>
								</li>
							</ul>
							
							<!--Top Drop Down Menu 3 HTML-->		
							<ul id="ddsubmenu3" class="ddsubmenustyle">
								<li><a href="../Paginas/Expediente.php" target="contenido">Expediente</a></li>
								<li><a href="#">Buscar Comunicacion</a>
									<ul>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Tipo</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Remitente</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Destinatario</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Nivel de Prioridad</a></li>
									</ul>
								</li>
							</ul>
							
							<!--Top Drop Down Menu 4 HTML-->		
							<ul id="ddsubmenu4" class="ddsubmenustyle">
								<li><a href="#">Consolidados</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Diario</a></li>
										<li><a href="../Paginas/.php" target="contenido">Mensual</a></li>
									</ul>
								</li>
								<li><a href="#">Informes</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Expediente de Denuncias</a></li>
										<li><a href="../Paginas/.php" target="contenido">Origen de las Comunicaciones</a></li>
									</ul>
								</li>
							</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú Asistente o secretaria
	Descripción:Función que muestra el menú de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuEAudiecias()
	{

		echo '
							<div id="ddtopmenubar" class="mattblackmenu">
								<ul>
									<li><a href="../Paginas/centroAuten.php" target="contenido">Principal</a></li>
									<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
									<li><a href="#" rel="ddsubmenu2">Asignaciones</a></li>
									<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
									<li><a href="#" rel="ddsubmenu4">Reportes y Estadisticas</a></li>
									<li><a href="../Paginas/logout.php" target="contenido">Salir</a></li>
								</ul>
							</div>
							
							<!--Top Drop Down Menu 1 HTML-->						
							<ul id="ddsubmenu1" class="ddsubmenustyle">
								
								<li><a href="#">Entrantes:</a>
									<ul>
										<li><a href="../Paginas/entrantes.php" target="contenido">Nueva Comunicación</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuesta</a></li>
									</ul>
								</li>
								<li><a href="../Paginas/salientes.php" target="contenido">Saliente</a></li>
							</ul>
							
							<!--Top Drop Down Menu 2 HTML-->						
							<ul id="ddsubmenu2" class="ddsubmenustyle">
								<li><a href="#">Pendientes</a>
									<ul>
										<li><a href="../Paginas/CheckAsignaciones.php" target="contenido">Asignaciones</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuestas a Enviadas</a></li>
									</ul>
								</li>
								<li><a href="#">Audiencias</a>
									<ul>
										<li><a href="../Paginas/audienciasFechas.php" target="contenido">Concertar Fecha</a></li>
										<li><a href="../Paginas/audienciasResumen.php" target="contenido">Cargar Directriz PostAudiencia</a></li>
									</ul>								
								</li>
							</ul>
							
							<!--Top Drop Down Menu 3 HTML-->		
							<ul id="ddsubmenu3" class="ddsubmenustyle">
								<li><a href="../Paginas/Expediente.php" target="contenido">Expediente</a></li>
								<li><a href="#">Buscar Comunicacion</a>
									<ul>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Tipo</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Remitente</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Destinatario</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Nivel de Prioridad</a></li>
									</ul>
								</li>
							</ul>
							
							<!--Top Drop Down Menu 4 HTML-->		
							<ul id="ddsubmenu4" class="ddsubmenustyle">
								<li><a href="#">Consolidados</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Diario</a></li>
										<li><a href="../Paginas/.php" target="contenido">Mensual</a></li>
									</ul>
								</li>
								<li><a href="#">Informes</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Expediente de Denuncias</a></li>
										<li><a href="../Paginas/.php" target="contenido">Origen de las Comunicaciones</a></li>
									</ul>
								</li>
							</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	función: Menú Asistente o secretaria
	Descripción:Función que muestra el menú de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	Parámetros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuEGacetas()
	{

		echo '
							<div id="ddtopmenubar" class="mattblackmenu">
								<ul>
									<li><a href="../Paginas/centroAuten.php" target="contenido">Principal</a></li>
									<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
									<li><a href="#" rel="ddsubmenu2">Asignaciones</a></li>
									<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
									<li><a href="#" rel="ddsubmenu4">Reportes y Estadisticas</a></li>
									<li><a href="../Paginas/logout.php" target="contenido">Salir</a></li>
								</ul>
							</div>
							
							<!--Top Drop Down Menu 1 HTML-->						
							<ul id="ddsubmenu1" class="ddsubmenustyle">
								
								<li><a href="#">Entrantes:</a>
									<ul>
										<li><a href="../Paginas/entrantes.php" target="contenido">Nueva Comunicación</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuesta</a></li>
									</ul>
								</li>
								<li><a href="#">Salientes:</a>
									<ul>
										<li><a href="../Paginas/salientes.php" target="contenido">Nueva Comunicación</a></li>
										<li><a href="../Paginas/.php" target="contenido">Redirección</a></li>
									</ul>
								</li>
							</ul>
							
							<!--Top Drop Down Menu 2 HTML-->						
							<ul id="ddsubmenu2" class="ddsubmenustyle">
								<li><a href="#">Pendientes</a>
									<ul>
										<li><a href="../Paginas/CheckAsignaciones.php" target="contenido">Asignaciones</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuestas a Enviadas</a></li>
									</ul>
								</li>
								<li><a href="#">Audiencias</a>
									<ul>
										<li><a href="../Paginas/audienciasFechas.php" target="contenido">Concertar Fecha</a></li>
										<li><a href="../Paginas/audienciasResumen.php" target="contenido">Cargar Directriz PostAudiencia</a></li>
									</ul>								
								</li>
							</ul>
							
							<!--Top Drop Down Menu 3 HTML-->		
							<ul id="ddsubmenu3" class="ddsubmenustyle">
								<li><a href="../Paginas/Expediente.php" target="contenido">Expediente</a></li>
								<li><a href="#">Buscar Comunicacion</a>
									<ul>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Tipo</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Remitente</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Destinatario</a></li>
										<li><a href="../Paginas/busquedas.php" target="contenido">Por Nivel de Prioridad</a></li>
									</ul>
								</li>
							</ul>
							
							<!--Top Drop Down Menu 4 HTML-->		
							<ul id="ddsubmenu4" class="ddsubmenustyle">
								<li><a href="#">Consolidados</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Diario</a></li>
										<li><a href="../Paginas/.php" target="contenido">Mensual</a></li>
									</ul>
								</li>
								<li><a href="#">Informes</a>
									<ul>
										<li><a href="../Paginas/.php" target="contenido">Expediente de Denuncias</a></li>
										<li><a href="../Paginas/.php" target="contenido">Origen de las Comunicaciones</a></li>
									</ul>
								</li>
							</ul>
		';
	}

?>
