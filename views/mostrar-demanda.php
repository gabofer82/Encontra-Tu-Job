<?php
?>
	<div id="cont-variable">
	
		<div>
			Titulo: <?php echo $demanda->getTitulo();?><br>
			Referencia: <?php echo $demanda->getReferecnia();?><br>
			Perfil: <?php echo $demanda->getPerfil();?><br>
			Cargo: <?php echo $demanda->getCargo();?><br>
			Horario: <?php echo $demanda->getHorario();?><br>
			Vacantes: <?php echo $demanda->getVacantes();?><br>
			Empresa: <?php echo $demanda->getEmpresa();?><br>
			
		</div>
		
		
		<div>Descripción:
		<fieldset>
			 <?php echo $demanda->getDescripcion();?>
		</fieldset>	
		</div>
		
		<div>
			Conocimientos: <?php echo $demanda->getConocimientos();?><br>
			Nivel Estudios: <?php echo $demanda->getNivelEstudio();?><br>
			Idioma: <?php ;?><br>
		</div>
		
		
		<div>
			Fecha de Inicio:  <?php echo $demanda->getFechaPublicada();?><br>
			Fecha de Cierre:  <?php echo $demanda->getFechaCierre();?><br>
			</div>
			
			<div>Numero de Postulados: <?php echo $demanda->getPostulados() ;?><br>
				<a href="">Ver Postulados</a>
			</div>
	
		<form>
			
			<input type="button" name="btnpostularse" id="btnpostularse" value="Postularse" />
			<input type="hidden" name="hdndemanda" id="hdndemanda" value=<?php $demanda;  ?> />
			
		</form>
	
	</div>
<?php

?>