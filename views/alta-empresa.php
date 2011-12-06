<?php?>
<div id="cont-variable">
	<form action='http://localhost/Encontra-Tu-Job/index.php?controlador=Empresa&accion=alta_empresa' method="POST" id="AltaEmpresa" class="formularios">
		<fieldset class="registro">
			<legend>
				Datos de Registro
			</legend>
			<label for="txtUsrNom">Nombre de Usuario</label>
			<input type="text" name="txtUsrNom" id="txtUsrNom"/><br />
			<label for="txtUsrPass">Contraseña</label>
			<input type="password" name="txtUsrPass" id="txtUsrPass" /><br />
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" name="txtUsrRePass" id="txtUsrRePass"/>
			</fieldset class="registro">
			<fieldset>
				<legend>
					Datos de Empresa
				</legend>
				<label>Nombre(s)</label>
				<input type="text" name="txtNombre" id="txtNombre"/><br />
				<label>Ciudad</label>
				<select name="slcciudad" id="ciudad">
					<?php
					// $listado es una variable asignada desde el controlador ItemsController.

					foreach ($ciudades as $v) {

						echo '<option>' . $v . '</option>';
					}
					?>
				</select><br />
				<label style="clear: left">Rubros</label>
				<select name="slcrubro" id="ciudad">
					<?php
					// $listado es una variable asignada desde el controlador ItemsController.

					foreach ($rubros as $v) {

						echo '<option>' . $v . '</option>';
					}
					?>
				</select><br />
				<!--Este campo por el momento será oculto, en el futuro si se requieren contemplar varios paises
				a la hora del registro se cambiará-->
				<input type="hidden" name="slcpais" id="slcpais" value="1" />
			</fieldset>
			<input class="submit" type="submit" value="Registrarse" id="btnEnviar" />
			<input class="submit" type="reset" value="Restablecer" id="btnReset" />
	</form>
</div>
</div>