<?php
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº no autentificado
	DescripciÃ³n: FunciÃ³n que muestra el menÃº de usuario previa autenticaciÃ³n en el sistema.
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
	function menuNoAutent()
		{
	
			echo '
					<div id="ddtopmenubar" class="mattblackmenu">
						<ul>
							<li><a href="./noAutentif.php" target="contenido">Principal</a></li>
							<li><a href="./autentificacion.php" target="contenido">Ingresar</a></li>
							<li><a href="./desarrolladores.php" target="contenido">Desarrolladores</a></li>
						</ul>
					</div>
			';
		}

/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº administrador
	DescripciÃ³n: FunciÃ³n que muestra el menÃº del usuario Administrador (previa autenticaciÃ³n en el sistema).
	Desarrollador: Carlos Castillo, menu extraido de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
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
					<li><a href="./logGeneral.php" target="contenido">General</a></li>
				</ul>
				<!--Top Drop Down Menu 2 HTML-->						
				<ul id="ddsubmenu2" class="ddsubmenustyle">
					<li><a href="./usuario.php" target="contenido">Crear Nuevo</a></li>
				</ul>
		';
	}
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº Recepcionista
	DescripciÃ³n: FunciÃ³n que muestra el menÃº de usuario con acceso recepcionista.
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
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
							<li><a href="./cEstandar.php" target="contenido">Comunicación Estándar</a>
							<li><a href="./gaceta.php" target="contenido">Gaceta</a></li>
							<li><a href="./audiencia.php" target="contenido">Audiencia</a></li>
							<li><a href="./invitacion.php" target="contenido">Invitación</a></li>
							<li><a href="./denuncia.php" target="contenido">Denuncia</a></li>
							<li><a href="./buscar.php" target="contenido">Buscar</a></li>							
						</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº completo
	DescripciÃ³n:FunciÃ³n que muestra el menÃº de usuario completo en el sistema (secretario general o coordinadora).
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuCompleto()
	{

		echo '
				<div id="ddtopmenubar" class="mattblackmenu">
					<ul>
						<li><a href="Autentificado.php" target="contenido">Principal</a></li>
						<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
						<li><a href="#" rel="ddsubmenu2">Operaciones</a></li>
						<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
						<li><a href="#" rel="ddsubmenu4">Usuarios</a></li>
						<li><a href="javascript:logOut()">Salir</a></li>
					</ul>
				</div>
			
				<!--Top Drop Down Menu 1 HTML-->						
				<ul id="ddsubmenu1" class="ddsubmenustyle">
					
					<li><a href="#">Entrantes:</a>
						<ul id="ddsubmenu1" class="ddsubmenustyle">
							<li><a href="./cEstandar.php" target="contenido">Comunicación Estándar</a>
							<li><a href="./gaceta.php" target="contenido">Gaceta</a></li>
							<li><a href="./audiencia.php" target="contenido">Audiencia</a></li>
							<li><a href="./invitacion.php" target="contenido">Invitación</a></li>
							<li><a href="./denuncia.php" target="contenido">Denuncia</a></li>						
						</ul>
					</li>
					<li><a href="#">Salientes:</a>
						<ul id="ddsubmenu1" class="ddsubmenustyle">
							<li><a href="./salienteCEstandar.php" target="contenido">Comunicación Estándar</a>
							<li><a href="./salienteGaceta.php" target="contenido">Gaceta</a></li>
							<li><a href="./salienteAudiencia.php" target="contenido">Audiencia</a></li>
							<li><a href="./salienteInvitacion.php" target="contenido">Invitación</a></li>
							<li><a href="./salienteDenuncia.php" target="contenido">Denuncia</a></li>						
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 2 HTML-->						
				<ul id="ddsubmenu2" class="ddsubmenustyle">
					<li><a href="./asignar.php" target="contenido">Asignar</a></li>
				</ul>
				
				<!--Top Drop Down Menu 3 HTML-->		
				<ul id="ddsubmenu3" class="ddsubmenustyle">
					<li><a href="./expediente.php" target="contenido">Expediente</a></li>
					<li><a href="#">Buscar Comunicacion</a>
						<ul>
							<li><a href="./buscar.php" target="contenido">Busqueda Simple</a></li>	
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 4 HTML-->								
				<ul id="ddsubmenu4" class="ddsubmenustyle">
					<li><a href="./usuario.php" target="contenido">Crear Nuevo</a></li>
				</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº Asistente o secretaria
	DescripciÃ³n:FunciÃ³n que muestra el menÃº de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
	Salida: ---
--------------------------------------------------------------------------------------------------------------------------------*/
	
function menuAsistSecr()
	{

		echo '
				<div id="ddtopmenubar" class="mattblackmenu">
					<ul>
						<li><a href="Autentificado.php" target="contenido">Principal</a></li>
						<li><a href="#" rel="ddsubmenu1">Comunicaciones</a></li>
						<li><a href="#" rel="ddsubmenu2">Asignaciones</a></li>
						<li><a href="#" rel="ddsubmenu3">Consultas</a></li>
						<li><a href="javascript:logOut()">Salir</a></li>
					</ul>
				</div>
			
				<!--Top Drop Down Menu 1 HTML-->						
				<ul id="ddsubmenu1" class="ddsubmenustyle">
					<li><a href="#">Entrantes:</a>
						<ul id="ddsubmenu1" class="ddsubmenustyle">
							<li><a href="./cEstandar.php" target="contenido">Comunicación Estándar</a>
							<li><a href="./gaceta.php" target="contenido">Gaceta</a></li>
							<li><a href="./audiencia.php" target="contenido">Audiencia</a></li>
							<li><a href="./invitacion.php" target="contenido">Invitación</a></li>
							<li><a href="./denuncia.php" target="contenido">Denuncia</a></li>						
						</ul>
					</li>
					<li><a href="#">Salientes:</a>
						<ul id="ddsubmenu1" class="ddsubmenustyle">
							<li><a href="./salienteCEstandar.php" target="contenido">Comunicación Estándar</a>
							<li><a href="./salienteGaceta.php" target="contenido">Gaceta</a></li>
							<li><a href="./salienteAudiencia.php" target="contenido">Audiencia</a></li>
							<li><a href="./salienteInvitacion.php" target="contenido">Invitación</a></li>
							<li><a href="./salienteDenuncia.php" target="contenido">Denuncia</a></li>						
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 2 HTML-->		
				<ul id="ddsubmenu2" class="ddsubmenustyle">
					<li><a href="./consulAsig.php" target="contenido">Consultar</a></li>
					<li><a href="./reportar.php" target="contenido">Reportar</a></li>
				</ul>
				
				<!--Top Drop Down Menu 3 HTML-->		
				<ul id="ddsubmenu3" class="ddsubmenustyle">
					<li><a href="./expediente.php" target="contenido">Expediente</a></li>
					<li><a href="#">Buscar Comunicacion</a>
						<ul>
							<li><a href="./buscar.php" target="contenido">Busqueda Simple</a></li>	
						</ul>
					</li>
				</ul>
				
				<!--Top Drop Down Menu 4 HTML-->								
				<ul id="ddsubmenu4" class="ddsubmenustyle">
					<li><a href="./usuario.php" target="contenido">Crear Nuevo</a></li>
				</ul>
		';
	}
	
/*-------------------------------------------------------------------------------------------------------------------------------- 
	funciÃ³n: MenÃº Asistente o secretaria
	DescripciÃ³n:FunciÃ³n que muestra el menÃº de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
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
							<li><a href="../Paginas/entrantes.php" target="contenido">Nueva ComunicaciÃ³n</a></li>
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
	funciÃ³n: MenÃº Asistente o secretaria
	DescripciÃ³n:FunciÃ³n que muestra el menÃº de usuario con acceso asistente o secretaria
	Desarrollador: Carlos Castillo, menu de http://www.dynamicdrive.com 
	Modificado: 
	
	ParÃ¡metros entrada: ---
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
										<li><a href="../Paginas/entrantes.php" target="contenido">Nueva ComunicaciÃ³n</a></li>
										<li><a href="../Paginas/.php" target="contenido">Respuesta</a></li>
									</ul>
								</li>
								<li><a href="#">Salientes:</a>
									<ul>
										<li><a href="../Paginas/salientes.php" target="contenido">Nueva ComunicaciÃ³n</a></li>
										<li><a href="../Paginas/.php" target="contenido">RedirecciÃ³n</a></li>
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