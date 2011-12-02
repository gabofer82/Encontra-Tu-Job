<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	echo SERVER_URL;
?>
	<div id="cont-variable">
	
					<label>Selecciona el tipo de cuenta a crear:</label>

				<a href="./alta-empresa.php">Empresa</a>
				<a href="./alta-candidato.php">Candidato</a>
		
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>