<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */	

?>

	<div id="cont-variable">
		<form action='http://localhost/Encontra-Tu-Job/index.php?controlador=Demandas&accion=alta_demanda' method="post" 
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
			
			foreach ($idio as $v) {
				echo '<option>'.$v.'</option>';	
			}
			?>
			</select>
			</div>
			<div>
			<label>Conocimientos</label>
			<input type="text" name="txtConocimientos" id="txtConocimientos"/>
<script language="javascript" type="text/javascript" src="./views/js/fechaNac.js"></script>
			<label>Fecha de Publicada</label>
			<select name="anhoPubli"  id="anhoNac" class="anhoNac" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesPubli" id="mesNac" class="mesNac" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaPubli" id="diaNac" class="diaNac" >
			<script>ponerDias();</script>
			</select>
<script language="javascript" type="text/javascript" src="./views/js/fechaNacBis.js"></script>
			<label>Fecha de Cierre</label>
			<select name="anhoCierre" id="anhoNac2" class="anhoNac" onchange="ponerDias()">
			<script>ponerAnho();</script>
			</select>
			<select name="mesCierre" id="mesNac2" class="mesNac" onchange="ponerDias()">
			<script>ponerMes();</script>
			</select>
			<select name="diaCierre" id="diaNac2" class="diaNac">
			<script>ponerDias();</script>
			</select>
			</div>	
		
			<input class="submit" type="submit" value="Registrar" id="btnEnviar" />
			<input type="reset" value="Restablecer" id="btnReset" />
			
		</form>						
									
		</form>
	</div>
</div>
<?php
?>