<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
?>

<script type="text/javascript">
	
	function RegistroMostrar () {
	  
	  alert("Ya se encuentra en el formulario de registro");
	  
	}
	
</script>



	<div id="cont-variable">
	
			<form action="./empresa/alta-empresa.php" method="post" id="AltaFormulario" class="formularios">
				<label>Selecciona el tipo de cuenta a crear:</label>
				<input type="submit" id="AltaEmp" value="Empresa" />
				<a href="./alta-empresa.php">Empresa</a>
				
			</form>				
		
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>