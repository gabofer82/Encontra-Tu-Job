<?php


	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	include_once __DIR__.'/../modelos/candidato_admin.class.php';
	$objU = CandidatoAdmin::getInstance() ;
	$GLOBALS['adminCandidato'] = $objU;

	
?>

<style type="text/css">
	
div#cont-variable {

	height: 420px;

}
</style>

<script language="javascript" type="text/javascript" src="../templates/js/fechaNac.js"></script>

	<div id="cont-variable">
		<form action="../controladores/candidato_controller.php?action=altaCandidato" method="post" id="AltaCandidato" class="formularios">
			
			<fieldset class="registro">
			<legend>Datos de Registro</legend>
			
			<label for="txtUsrNom">Nombre de Usuario</label>
			<input type="text" name="txtUsrNom" id="txtUsrNom"/>
			
			<label for="txtUsrPass">Contraseña</label>
			<input type="password" name="txtUsrPass" id="txtUsrPass" />
			
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" name="txtUsrRePass" id="txtUsrRePass"/>
			
			</fieldset class="registro">
			
			<fieldset>
			<legend>Datos de Usuario</legend>
			
			<label>Nombre(s)</label>
			<input type="text" name="txtNombre" id="txtNombre"/>
			
			<label>Apellido(s)</label>
			<input type="text" name="txtApellido" id="txtApellido"/>
			
			<label>Sexo</label>
			<label for="rbM">Masculino</label><input type="radio" name="rbSexo" id="rbM" value="M" />
			<label for="rbF">Femenino</label><input type="radio" name="rbSexo" id="rbF" value="F" />
			
			<label for ="anhoNac">Fecha de Nacimiento</label>
			<select name="anhoNac" id="anhoNac" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesNac" id="mesNac" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaNac" id="diaNac">
			<script>ponerDias();</script>
			</select>
					
			<label>Ciudad</label>
			
			<select name="slcciudad" id="ciudad">
			<?php 

			$arr = $objU->obtenerCiudades();
			
			foreach ($arr as $v) {

				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			<!--Este campo por el momento será oculto, en el futuro si se requieren contemplar varios paises 
				a la hora del registro se cambiará-->
			<input type="hidden" id="slcpais" value="Uruguay" />
			</fieldset>
			
			<input type="submit" value="Registrarse" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />
			
		</form>
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>