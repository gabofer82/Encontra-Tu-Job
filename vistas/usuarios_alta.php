<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
?>
	<div id="cont-variable">
	
					<label>Selecciona el tipo de cuenta a crear:</label>

				<a href="./alta-empresa.php">Empresa</a>
				<a href="./alta-candidato.php">Candidato</a>
		
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>