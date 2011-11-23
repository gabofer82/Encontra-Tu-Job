<?php
		echo "<script>alert(\"llegamos? prncipio\")</script>";
require_once __DIR__ . '/../modelos/candidato_admin.class.php';

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	$CanAdmin = CandidatoAdmin::getInstance();

} else {
	header("Al parecer el programador se olvido de coddear algo y apareció un bug. Vamos por café y 
		lo solucionamos");
}

if ($orden == "altaCandidato") {
		echo "<script>alert(\"llegamos? controller if\")</script>";
	
	if ($CanAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])){
		$pass = md5($_POST['txtUsrPass']);
	$retorno = $CanAdmin -> altaCandidato($_POST['txtUsrNom'], $pass,$_POST['txtNombre'],
	$_POST['txtApellido'],"M",$_POST['slcciudad'],$_POST['slcpais'] ,$fecha);

		if ($retorno) {
			
			
			header('location: index.php');
			
		}

	}
}
?>