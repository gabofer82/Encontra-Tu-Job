<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
 	include_once __DIR__.'/../modelos/candidato_admin.class.php';
	$objU = CandidatoAdmin::getInstance() ;
	$GLOBALS['adminCandidato'] = $objU;
	
	if (!$objU->tieneCurriculum()) {
		
		echo "Aun no has ingresado tu Curriculum al Sistema.";
		echo "Hazlo haciendo click"
?> <a href="alta-curriculum.php">aqui</a><?php
} else {
	session_start();
	$curr = unserialize($_SESSION['curr']);
	$usr = $_SESSION['user'];
echo var_dump($curr);
?>
<div id='cont-variable'>
	<div>
		<img src=> <br>
		Foto de Perfil
	</div>

	<div>
		Nombre: <?php echo $usr->getNom();?> Apellido: <?php echo $usr->getApe();?> <br>
		Documento: <?php echo $curr->getTipoDoc().": ". $curr->getDocumento()?><br>
		Sexo: <?php ?><br>
		Fecha de Nacimiento: <??>
		Ciudad: Direccion: <??>Codigo Postal: <??><br>
		Telefono: Mail: <??><br>
	</div>
	<div>
		Puesto Preferido: <??><br>
		Estudios Realizados: <??><br>
		Experiencia Laboral: <??><br>
				Idiomas:
	</div>
</div>
<?php
}
include_once __DIR__.'/../templates/footer.php';
?>