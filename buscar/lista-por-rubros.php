<?php
    <?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */	
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	include_once __DIR__.'/../dominio/Postulantes.class.php';
	$result = 
?>
	<div id="cont-variable">
		<?php
			while ($row = mysql_fetch_array($result)) {
			  echo "los datos en una tabla"
			}
		?>
	</div>
</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>
?>
?>