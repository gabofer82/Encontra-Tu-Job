<?php
require_once __DIR__ . '/../modelos/candidato_admin.class.php';

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	$CanAdmin = CandidatoAdmin::getInstance();

} else {

}
if ($orden == "altaCandidato") {
	if ($CanAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
		$pass = md5($_POST['txtUsrPass']);
		$fecha = $_POST['anhoNac'] . "" . $_POST['mesNac'] . "" . $_POST['diaNac'];
		$retorno = $CanAdmin -> altaCandidato($_POST['txtUsrNom'], $pass, $_POST['txtNombre'], $_POST['txtApellido'], $_POST['radioSexo'], $_POST['slcciudad'], $_POST['slcpais'], $fecha);
		
	}
} else if ($orden == "modCandidato") {
				echo "aca llegamos??";
	session_start();
	$passVieja = md5($_POST['txtUsrActPass']);
	if ($_SESSION['user'] -> getPass() == $passVieja) {
		if ($CanAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
				
			$pass = md5($_POST['txtUsrPass']);
			$fecha = $_POST['anhoNac'] . "" . $_POST['mesNac'] . "" . $_POST['diaNac'];
			echo "aca llegamos";
			$retorno = $CanAdmin -> modCandidato($pass, $_POST['txtNombre'], 
			$_POST['txtApellido'], $_POST['radioSexo'], $_POST['slcciudad'], $_POST['slcpais'], $fecha);

		}
	}
} else if ($orden = "altaCurriculum") {
	
	$retorno = altaCurriculum($_POST['txtDocNum'],$_POST['txtDocTipo'],$_POST['txtMail'],$_POST['txtEdoCivil'],
	$_POST['txtDir'],$_POST['txtCP'],$_POST['txtTel'],$_POST['fileFoto'],$_POST['txtPuesto'],$_POST['txtEstudios'],
	$_POST['txtLaborales'],$_POST['slcIdioma'],$_POST['slcNivel'],$_POST['chkSubs']);
	
}
?>