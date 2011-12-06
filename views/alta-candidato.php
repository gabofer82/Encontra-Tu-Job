<?php
?>
<script language="javascript" type="text/javascript" src="./views/js/fechaNac.js"></script>
<style type="text/css">
	
div#cont-variable {

	height: 420px;

}
</style>



	<div id="cont-variable">
		<form action="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=alta_candidato" method="post" id="AltaCandidato" class="formularios">
			
			<fieldset class="registro">
			<legend>Datos de Registro</legend>
			
			<label for="txtUsrNom">Nombre de Usuario</label>
			<input type="text" name="txtUsrNom" id="txtUsrNom" /><br />
			
			<label for="txtUsrPass">Contraseña</label>
			<input type="password" name="txtUsrPass" id="txtUsrPass" /><br />
			
			<label for="txtUsrRePass">Confirmar Contraseña</label>
			<input type="password" name="txtUsrRePass" id="txtUsrRePass"/><br />
			
			</fieldset class="registro">
			
			<fieldset>
			<legend>Datos de Usuario</legend>
			
			<label>Nombre(s)</label>
			<input type="text" name="txtNombre" id="txtNombre"/><br />
			
			<label>Apellido(s)</label>
			<input type="text" name="txtApellido" id="txtApellido"/><br />
			
			<label>Sexo</label><br />
<!--aca pasa algo raro Si se seleccionan los radiobutton( cualquiera de ellos) manda a una pagina index.php que no existe-->
			<div style="width: 300px;">
				<label for="rbM" >Masculino</label>
				<input type="radio" name="radioSexo" id="rbM" value="M" /><br />
				<label for="rbF" >Femenino</label>
				<input type="radio" name="radioSexo" id="rbF" value="F" /><br />
			</div>
			
			<div>
				<select name="anhoNac" id="anhoNac" class="anhoNac" onchange="ponerDias()">
				<script>ponerAnho();</script>
				</select>
				<select name="mesNac" id="mesNac" class="mesNac" onchange="ponerDias()">
				<script>ponerMes();</script>
				</select>
				<select name="diaNac" id="diaNac" class="diaNac">
				<script>ponerDias();</script>
				</select><br/>
				<label for ="anhoNac" >Fecha de Nacimiento</label>
				<hr style="clear: left; visibility: hidden"/>
			</div>
					
			<label>Ciudad</label>
			
			<select name="slcciudad" id="ciudad">
			<?php 
			
			foreach ($ciudades as $v) {

				echo '<option>'.$v.'</option>';	
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