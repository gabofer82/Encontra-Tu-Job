<?php

?>

<style type="text/css">
	div#cont-variable {

		height: 420px;
	}
</style>
<script language="javascript" type="text/javascript" src="./views/js/fechaNac.js"></script>
<div id="cont-variable">
	<form action="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=mod_Candidato" method="post" id="AltaCandidato" class="formularios">
		<fieldset>
			<legend>
				Datos de Perfil
			</legend>
			<label>Nombre de Usuario: <?php echo $_SESSION['user']->getNick() ;?></label>
			<a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=ver_curriculum">Ver Curriculum</a>
			</fieldset>
			
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
			
			<fieldset>
			<legend>
				Editar Datos Personales
			</legend>
			<label>Nombre(s)</label>
			<input type="text" name="txtNombre" id="txtNombre"/>
			<label>Apellido(s)</label>
			<input type="text" name="txtApellido" id="txtApellido"/>
			<label>Sexo</label>
			<!--aca pasa algo raro Si se seleccionan los radiobutton( cualquiera de ellos) manda a una pagina index.php que no existe-->
			<label for="rbM">Masculino</label>
			<input type="radio" name="radioSexo" id="rbM" value="M" />
			<label for="rbF">Femenino</label>
			<input type="radio" name="radioSexo" id="rbF" value="F" />
			<label for ="anhoNac">Fecha de Nacimiento</label>
			<select name="anhoNac" id="anhoNac" onchange="ponerDias()">
				<script>ponerAnho();	</script>
			</select>
			<select name="mesNac" id="mesNac" onchange="ponerDias()">
				<script>ponerMes();	</script>
			</select>
			<select name="diaNac" id="diaNac">
				<script>ponerDias();</script>
			</select>
			<label>Ciudad</label>
			<select name="slcciudad" id="ciudad">
				<?php
				$arr = $ciudades;
				foreach ($arr as $v) {
					echo '<option>' . $v . '</option>';
				}?>
			</select>
		<input type="hidden" name="slcpais" id="slcpais" value="1" />
		</fieldset>
		<input class="submit" type="submit" value="Registrarse" id="btnEnviar" />
		<input type="reset" value="Restablecer" id="btnReset" />
	</form>
</div>
<?php

?>