<?php



	if ($_SESSION['user'] -> getNick() == "Visitante") {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job-Test/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="#">Buscar Empleo</a></li>
					</ul>
				</div>
<?php
	} else {
		if ($_SESSION['user'] instanceof Candidato)  {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job-Test/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="./vistas/modificar-candidato.php">Mi Perfil</a></li>
						<li><a href="./vistas/ver-curriculum.php">Mi Curriculum</a></li>						
						<li><a href="#">Buscar Empleo</a></li>
					</ul>
				</div>
<?php
		} else if ($_SESSION['user'] instanceof Empresa) {
?>
		<div id="contenido">
			<div id="cabecera">
				<h1><a href="http://localhost/Encontra-Tu-Job-Test/index.php?controlador=&accion="><img src="ruta" alt="Encontr&aacute; Tu Job"/></a>Encontr&aacute; Tu Job!</h1>			
			</div>
			<div id="nav-bar">
					<ul>
						<li><a href="#">Ver Perfil</a></li>
						<li><a href="#">Mis Demandas </a></li>
						<li><a href="#">Buscar</a></li>
					</ul>
				</div>
<?php			
		}
	}
?>
