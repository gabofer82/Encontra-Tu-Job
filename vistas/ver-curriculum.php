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

?>
<div id='cont-variable'>
	<div>
		<img src="..\<?php echo $curr->getFoto();?>"> <br>
		Foto de Perfil
	</div>

	<div>
		Nombre: <?php echo $usr->getNom();?> Apellido: <?php echo $usr->getApe();?> <br>
		Documento: <?php echo $curr->getTipoDoc().": ". $curr->getDocumento()?><br>
		Sexo: <?php echo $usr->getSexo(); ?><br>
		Fecha de Nacimiento: <?php echo $usr->getFNac(); ?>
		Ciudad: <?php echo $objU->obtenerNombreCiudad($usr->getCiudad(),$usr->getPais()) ?>, Direccion: <?php $curr->getDireccion(); ?>, 
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
			echo $objU->obtenerNombreIdioma($idioma)." - Dominio: ". $nivel; 
		}
		?>
	</div>
	<div>
	<a href="">Editar</a>
	</div>
</div>
<?php
}
include_once __DIR__.'/../templates/footer.php';
?>