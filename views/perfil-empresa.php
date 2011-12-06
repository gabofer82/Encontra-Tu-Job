<?php?>
<style type="text/css">
	div#cont-variable {

		height: 420px;
	}
</style>
<script language="javascript" type="text/javascript" src="./views/js/fechaNac.js"></script>
<script language="javascript" type="text/javascript" src="./views/js/validarImg.js"></script>
<div id="cont-variable">
	<form action="http://localhost/Encontra-Tu-Job/index.php?controlador=Empresa&accion=mod_Empresa" 
	method="post" id="AltaCandidato" class="formularios" enctype="multipart/form-data">
		<fieldset>
			<legend>
				Editar Contraseña
			</legend>
			<label for="txtUsrPass">Contraseña Actual</label>
			<input type="password" name="txtUsrActPass" id="txtUsrActPass" />
			<label for="txtUsrPass">Contraseña Nueva</label>
			<input type="password" name="txtUsrPass" id="txtUsrPass" />
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" name="txtUsrRePass" id="txtUsrRePass"/>
		</fieldset>
		<div>
			<label>Nombre</label>
			<input type="text" name="txtNombre" id="txtNombre"/>
			<label>Razon Social</label>
			<input type="text" name="txtRazon" id="txtApellido"/>
			<label>RUT</label>
			<input type="text" name="txtRUT" id="txtApellido"/>
			<label>Direccion</label>
			<input type="text" name="txtDir" id="txtNombre"/>
			<label>Pagina Web</label>
			<input type="text" name="txtWeb" id="txtApellido"/>
			<label>Telefono</label>
			<input type="text" name="txtTel" id="txtApellido"/>
		</div>
		<div>
			<select name="slcciudad" id="ciudad">
				<?php
				$arr = $ciudades;
				foreach ($arr as $v) {
					echo '<option>' . $v . '</option>';
				}
				?>
			</select>
			<input type="hidden" name="slcpais" id="slcpais" value="1" />
		</div>
		<div>
			<label>Logo</label>
			<input type="file" name="fileFoto" id="fileFoto"/>
		</div>
		<input class="submit" type="submit" value="Enviar" id="btnEnviar" />
		<input type="reset" value="Restablecer" id="btnReset" />
	</form>
</div>
<?php?>