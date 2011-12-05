<?php
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/user-bar.php';
include_once __DIR__ . '/../templates/content.php';
include_once __DIR__ . '/../modelos/candidato_admin.class.php';
$objU = CandidatoAdmin::getInstance();
$GLOBALS['adminCandidato'] = $objU;
?>
<script language="javascript" type="text/javascript" src="../templates/js/validarImg.js"></script>

	<div id="cont-variable">
		<form action="../controladores/candidato_controller.php?action=editCurr" method="post" 
		id="ModCurriculum" class="formularios" enctype="multipart/form-data" onsubmit="return validar_img()">
			
			<div>
			Documento(*)<input type="text" name="txtDocNum" id="txtDocNum"/>
			<br>
			<input type="hidden" name="txtDocTipo" id="txtDocTipo" value="CI"/>			
			EMail(*)	<input type="email" name="txtMail" id="txtMail"/>						
			<br>
			Estado Civil<input type="text" name="txtEdoCivil" id="txtEdoCivil"/>
			<br>
			Direccion<input type="text" name="txtDir" id="txtDir"/>
			<br>
			Codigo Postal	<input type="text" name="txtCP" id="txtCP"/>
			<br>
			Telefono	<input type="text" name="txtTel" id="txtTel"/>
			<br>
			Foto de Perfil<input type="file" name="fileFoto" id="fileFoto"/>
			<br>
			</div>
			<div>
			Puesto Preferido<input type="text" name="txtPuesto" id="txtPuesto"/>			
			<br>
			Estudios Realizados (*)
			<textarea name="txtEstudios" id="txtEstudios" rows="15" cols="70"></textarea>
			<br>
			Experiencia Laboral (*)
			<textarea name="txtLaborales" id="txtLaborales" rows="15" cols="70"></textarea>
			<br>
			Idiomas (Seleccione uno. Luego podrá agregar mas)
			<select name="slcIdioma" id="slcIdioma">
			<?php 
			$arr = $objU->obtenerIdiomas();
			echo var_dump($arr);
			foreach ($arr as $v) {
				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			Nivel
			<select name="slcNivel" id="slcNivel">
			<option>Bajo</option>	
			<option>Medio</option>
			<option>Alto</option>
			</select>
			<div>
			Suscripcion a bolet&iacute;n de ofertas?
			<input type="checkbox" name="chkSubs" id="chkSubs" value="S" />
			<input type="submit" value="Enviar" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />

		</form>
	</div>
<?php
include_once __DIR__ . '/../templates/footer.php';
?>