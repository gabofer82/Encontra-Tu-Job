<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
?>

<script language="javascript" type="text/javascript" src="../templates/js/validarImg.js"></script>

	<div id="cont-variable">
		<form action="../controladores/candidato_controller.php?action=altaCurriculum" 
		method="post" id="AltaCurriculum" class="formularios" enctype="multipart/form-data">

			<fieldset class="registro">
			<legend>Datos de Curriculum</legend>
			
			<label for="txtDocNum">Documento(*)</label>
			<input type="text" name="txtDocNum" id="txtDocNum"/>
			
			<label for="txtDocTipo">TipoDoc</label>
			<input type="hidden" name="txtDocTipo" id="txtDocTipo"/>			
						
			<label for="txtMail">EMail(*)</label>
			<input type="email" name="txtMail" id="txtMail"/>						
			
			<label for="txtEdoCivil">Estado Civil</label>
			<input type="text" name="txtEdoCivil" id="txtEdoCivil"/>
			
			<label for="txtDir">Direccion</label>
			<input type="text" name="txtDir" id="txtDir"/>
			
			<label for="txtCP">Codigo Postal</label>
			<input type="text" name="txtCP" id="txtCP"/>
			
			<label for="txtTel">Telefono</label>
			<input type="text" name="txtTel" id="txtTel"/>
			
			<label for="fileFoto">Foto de Perfil</label>
			<input type="file" name="fileFoto" id="fileFoto"/>

			<label for="txtPuesto">Puesto Preferido</label>
			<input type="text" name="txtPuesto" id="txtPuesto"/>			
	
			<label for="txtEstudios">Estudios Realizados (*)</label>
			<textarea name="txtEstudios" id="txtEstudios" rows="30" cols="50"></textarea>
			
			<label for="txtLaborales">Experiencia Laboral (*)</label>
			<textarea name="txtLaborales" id="txtLaborales" rows="30" cols="50"></textarea>
			
			<label for ="slcIdioma">Idiomas (Seleccione uno. Luego podrá agregar mas)</label>
			<select name="slcIdioma" id="slcIdioma">
			<?php 
			$arr = $objU->obtenerCiudades();
		
			foreach ($arr as $v) {
				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			<label for ="slcNivel">Nivel</label>		
			<select name="slcNivel" id="slcNivel">
			<option>Bajo</option>	
			<option>Medio</option>
			<option>Alto</option>
			</select>
			
			<label>Suscripcion a bolet&iacute;n de ofertas?</label>
			<label for="chkSubs">Si</label>
			<input type="checkbox" name="chkSubs" id="chkSubs" value="Si" />
			
			</fieldset class="registro">

			<input type="submit" value="Enviar" id="btnEnviar"  onclick=" validar_img()"/>
			<input type="reset" value="Restablecer" id="btnReset" />

		</form>
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>