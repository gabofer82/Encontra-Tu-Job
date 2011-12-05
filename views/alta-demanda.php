<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */	
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	include_once __DIR__.'/../modelos/usuario_admin.class.php';
	$objU = UsuarioAdmin::getInstance() ;
		
?>
<script language="javascript" type="text/javascript" src="../templates/js/fechaNac.js"></script>
	<div id="cont-variable">
		<form action="../controladores/empresa_controller.php?action=altaDemanda" method="post" 
		id="AltaDemanda" class="formularios">
			
			
			<div>			
			<label>T&iacute;tulo(*)</label>
			<input type="text" name="txtTitulo" id="txtTitulo" />
			
			<label>Referencia(*)</label>
			<input type="txtRef" name="txtRef" id="txtRef"/>
			
			<label>Descripci&oacute;(*)</label>
			<textarea name="txtDesc" id="txtDesc" cols="60" rows="15"></textarea>
			
			</div>
			<div>
			<label>Perfil Laboral</label>
			<input type="text" name="txtPerfil" id="txtPerfil"/>
			
			<label>Cargo</label>
			<input type="text" name="txtCargo" id="txtCargo"/>
									
			<label>Horario(*)</label>
			<input type="text" name="txtHorario" id="txtHorario"/>
			
			<label>Puestos Vacantes(*)</label>
			<input type="text" name="txtVacantes" id="txtVacantes"/>
			</div>
			<div>
			<label>Nivel de Estudios(*)</label>
			<input type="text" name="txtNivEstudios" id="txtNivEstudios"/>
			
			<label>Idioma</label>
			<select name="slcIdioma" id="slcIdioma">
			<?php 
			$arr = $objU->obtenerIdiomas();
			echo var_dump($arr);
			foreach ($arr as $v) {
				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			</div>
			<div>
			<label>Conocimientos</label>
			<input type="text" name="txtConocimientos" id="txtConocimientos"/>

			<label>Fecha de Publicada</label>
			<select name="anhoPubli"  id="anhoPubli" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesPubli" id="mesPubli" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaPubli" id="diaPubli">
			<script>ponerDias();</script>
			</select>

			<label>Fecha de Cierre</label>
			<select name="anhoCierre" id="anhoCierre" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesCierre" id="mesCierre" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaCierre" id="diaCierre">
			<script>ponerDias();</script>
			</select>
			</div>	
		
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