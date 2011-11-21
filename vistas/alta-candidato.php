<?php


	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	include_once __DIR__.'/../controladores/candidato_admin.class.php';
	
?>

<style type="text/css">
	
div#cont-variable {

	height: 420px;

}
</style>

<script language="javascript" type="text/javascript" src="../templates/js/fechaNac.js"></script>
<script language="JavaScript" type="text/javascript" scr= "../templates/js/encriptador.js"></script> 

	<div id="cont-variable">
		<form action="#" method="post" id="AltaCandidato" class="formularios">
			
			<fieldset class="registro">
			<legend>Datos de Registro</legend>
			
			<label for="txtUsrNom">Nombre de Usuario</label>
			<input type="text" id="txtUsrNom"/>
			
			<label for="txtUsrPass">Contraseña</label>
			<input type="password" id="txtUsrPass" />
			
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" id="txtUsrRePass"/>
			
			</fieldset class="registro">
			
			<fieldset>
			<legend>Datos de Usuario</legend>
			
			<label>Nombre(s)</label>
			<input type="text" id="txtNombre"/>
			
			<label>Apellido(s)</label>
			<input type="text" id="txtApellido"/>
			
			<label>Sexo</label>
			<label for="rbM">Masculino</label><input type="radio" name="rbSexo" id="rbM" value="M" />
			<label for="rbF">Femenino</label><input type="radio" name="rbSexo" id="rbF" value="F" />
			
			<label for ="anhoNac">Fecha de Nacimiento</label>
			<select id="anhoNac" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select id="mesNac" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select id="diaNac">
			<script>ponerDias();</script>
			</select>
					
			<label>Ciudad</label>
			
			<select id="ciudad">
			<?php 
			$objU = CandidatoAdmin::getInstance() ;
			
	
			$arr = $objU->obtenerCiudades();
			
			foreach ($arr as $v) {

				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			<!--Este campo por el momento será oculto, en el futuro si se requieren contemplar varios paises 
				a la hora del registro se cambiará-->
			<input type="hidden" id="pais" value="Uruguay" />
			</fieldset>
			
			<input type="submit" value="Registrarse" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />
			
		</form>
	</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>