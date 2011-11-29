<?php
require_once __DIR__ . '/../modelos/empresa_admin.class.php';

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	$EmpAdmin = EmpresaAdmin::getInstance();

}

if ($orden == "altaEmpresa") {


	if ($EmpAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
		$pass = md5($_POST['txtUsrPass']);
		
		$retorno = $EmpAdmin -> altaEmpresa($_POST['txtUsrNom'], $pass,$_POST['txtNombre'], 
		$_POST['slcciudad'], $_POST['slcpais']);

	}
}

?>