<?php
require_once __DIR__ . '/../modelos/candidato_admin.class.php';

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	$CanAdmin = CandidatoAdmin::getInstance();

} else {
	header("Al parecer el programador se olvido de coddear algo y apareció un bug. Vamos por café y 
		lo solucionamos");
}
if ($orden == "altaCandidato") {


	if ($CanAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
		$pass = md5($_POST['txtUsrPass']);
		$fecha = $_POST['anhoNac']."".$_POST['mesNac']."".$_POST['diaNac'];
		echo "<script>".var_dump($fecha)."</script>";
		$retorno = $CanAdmin -> altaCandidato($_POST['txtUsrNom'], $pass, $_POST['txtNombre'], $_POST['txtApellido'], "M", $_POST['slcciudad'], $_POST['slcpais'], $fecha);

	}
}
?>