<?php
?>
<div id="cont-variable">
	<form action='controllers/EmpresaController.php?accion=alta_empresa' method="POST" id="AltaEmpresa" class="formularios">
		<fieldset class="registro">
			<legend>
				Datos de Registro
			</legend>
			<label for="txtUsrNom">Nombre de Usuario</label>
			<input type="text" name="txtUsrNom" id="txtUsrNom"/>
			<label for="txtUsrPass">Contraseña</label>
			<input type="password" name="txtUsrPass" id="txtUsrPass" />
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" name="txtUsrRePass" id="txtUsrRePass"/>
			</fieldset class="registro">
			<fieldset>
			<legend>Datos de Empresa</legend>
				
			<label>Nombre(s)</label>
			<input type="text" name="txtNombre" id="txtNombre"/>
				
			<label>Ciudad</label>
			
			<select name="slcciudad" id="ciudad">
			<?php
				// $listado es una variable asignada desde el controlador ItemsController.
				foreach ($listadoCiudades as $value) {
				  echo '<option>'.$value.'</option>';	
				}
			?>
			</select>
				<!--Este campo por el momento será oculto, en el futuro si se requieren contemplar varios paises
				a la hora del registro se cambiará-->
				<input type="hidden" name="slcpais" id="slcpais" value="1" />
			</fieldset>
			<input type="submit" value="Registrarse" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />
	</form>
</div>
</div>