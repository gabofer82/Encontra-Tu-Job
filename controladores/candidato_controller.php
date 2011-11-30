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
		$fecha = $_POST['anhoNac']."".$_POST['mesNac']."".$_POST['diaNac'];
		$retorno = $CanAdmin -> altaCandidato($_POST['txtUsrNom'], $pass, $_POST['txtNombre'], $_POST['txtApellido'], $_POST['radioSexo'], $_POST['slcciudad'], $_POST['slcpais'], $fecha);

	}
}
?>