<?php



	if ($_SESSION['user'] -> getNick() == "Visitante") {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Demandas&accion=ver_demandas">Buscar Empleo</a></li>
					</ul>
				</div>
<?php
	} else {
		if ($_SESSION['user'] instanceof Candidato)  {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=ver_perfil">Mi Perfil</a></li>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=ver_curriculum">Mi Curriculum</a></li>						
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Demandas&accion=ver_demandas">Buscar Empleo</a></li>
					</ul>
				</div>
<?php
		} else if ($_SESSION['user'] instanceof Empresa) {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Empresa&accion=ver_perfil">Ver Perfil</a></li>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Empresa&accion=ver_mis_demandas">Mis Demandas </a></li>
						<li><a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Demandas&accion=ver_demandas">Buscar</a></li>
					</ul>
				</div>
<?php			
		}
	}
?>
