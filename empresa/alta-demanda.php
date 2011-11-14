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
		<form action="#" method="post" id="AltaDemanda" class="formularios">
			<!--Aca le faltaria algo para ver la nacionalidad-->
			
			<label>T&iacute;tulo</label>
			<input type="text" id="txtTitulo" />
			
			<!---->
			
			<label>Comienzo</label>
			<input type="email" id="txtComienzo"/>
			
			<!---->
			
			<label>Fin</label>
			<input type="email" id="txtFin"/>
			
			<!---->
			
			<label>Descripci&oacute;n</label>
			<textarea rows="8" cols="22" id="txtAreaDesc">
			</textarea>
			<!---->
			<input type="submit" id="btnRegPost" value="Registrarse" class="btnSubmit" />
			
		</form>
	</div>
</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>
?>