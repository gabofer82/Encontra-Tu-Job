<?php
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/user-bar.php';
include_once __DIR__ . '/../templates/content.php';
?>
<div id="cont-variable">
	<form action="#" method="post" id="AltaCurriculum" class="formularios">
		<fieldset class="registro">
			<legend>Datos de Contacto - Empresa</legend>
			
			<label>Nombre(s)</label>
			<input type="text" name="txtNom" id="txtNom"/>
			
			<label>Correo(s)</label>
			<input type="email" name="txtMail" id="txtMail"/>
			
			<label>Cargo</label>
			<input type="text" name="txtCargo" id="txtCargo"/>
			
			
			<label>Telefono</label>
			<input type="tel" name="txtTel" id="txtTel"/>
			
			<label>Horario de Contacto</label>
			<input type="text" name="txtHorarioContacto" id="txtHorarioContacto"/>
			
			</fieldset>
		<input class="submit" type="submit" value="Registrar" id="btnEnviar" />
		<input type="reset" value="Restablecer" id="btnReset" />
	</form>
</div>
<?php
include_once __DIR__ . '/../templates/footer.php';
?>