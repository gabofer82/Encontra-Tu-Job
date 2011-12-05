<?php
	
	if (!$curriculum) {
		
		echo "Aun no has ingresado tu Curriculum al Sistema.";
		echo "Hazlo haciendo click"
?> <a href="http://localhost/Encontra-Tu-Job/index.php?controlador=Candidatos&accion=view_alta_curriculum">aqui</a><?php
} else {

$usr = $usuario;
$curr = $curriculum;

?>
<div id='cont-variable'>
	<div>
		<img src="..\<?php echo $curr ->getFoto();?>"> <br>
		Foto de Perfil
	</div>

	<div>
		Nombre: <?php echo $usr->getNom();?> Apellido: <?php echo $usr->getApe();?> <br>
		Documento: <?php echo $curr->getTipoDoc().": ". $curr->getDocumento()?><br>
		Sexo: <?php echo $usr->getSexo(); ?><br>
		Fecha de Nacimiento: <?php echo $usr->getFNac(); ?>
		Ciudad: <?php echo $ciudad ?>, Direccion: <?php $curr->getDireccion(); ?>, 
		Codigo Postal: <?php $curr->getCodigoPostal(); ?><br>
		Telefono: <?php $curr->getTelefono(); ?> Mail: <?php $curr->getMail(); ?><br>
		Estado Civil: <?php $curr->getECivil(); ?>
	</div>
	<div>
		Puesto Preferido: <?php echo $curr->getPuestoDeseado(); ?><br>
		Estudios Realizados: <?php echo $curr->getEAcademicas(); ?><br>
		Experiencia Laboral: <?php echo $curr->getExLaboral(); ?><br>
		Idiomas: <br>
		<?php
		$arrIdiom = $curr->getIdiomas();
		foreach ($arrIdiom as $idioma => $nivel) {
			echo $idioma." - Dominio: ". $nivel; 
		}
		?>
	</div>
	<div>
	<a href="modificar-curriculum.php">Editar</a>
	</div>
</div>
<?php
}

?>