<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */	
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
?>
<script language="javascript" type="text/javascript" src="../templates/js/fechaNac.js"></script>
	<div id="cont-variable">
		<form action="#" method="post" id="AltaDemanda" class="formularios">
			
			
			<fieldset class="registro">
			<legend>Datos de Registro</legend>			
			
			<label>T&iacute;tulo(*)</label>
			<input type="text" id="txtTitulo" />
			
			<label>Referencia(*)</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Descripci&oacute;(*)</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Perfil Laboral</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Cargo</label>
			<input type="txtRef" id="txtComienzo"/>
									
			<label>Horario(*)</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Puestos Vacantes(*)</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Nivel de Estudios(*)</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Idioma</label>
			<input type="txtRef" id="txtComienzo"/>
			
			<label>Conocimientos</label>
			<input type="txtRef" id="txtComienzo"/>

			<label>Fecha de Publicada</label>
			<select name="anhoPubli" id="anhoPubli" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesPubli" id="mesPubli" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaPubli" id="diaPubli">
			<script>ponerDias();</script>
			</select>

			<label>Fecha de Cierre</label>
			<select name="anhoNac" id="anhoNac" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesNac" id="mesNac" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaCierre" id="diaNac">
			<script>ponerDias();</script>
			</select>
						
			</fieldset>
			
			<input type="submit" value="Registrar" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />
			
		</form>						
									
		</form>
	</div>
</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>
?>