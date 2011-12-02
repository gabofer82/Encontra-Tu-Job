<?php
require_once __DIR__ . '/../modelos/empresa_admin.class.php';

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	Empresa_Controller::setEmpresaAdmin(EmpresaAdmin::getInstance());
	switch ($orden) {
	  case 'altaEmpresa':
		Empresa_Controller::alta_empresa();
		break;
	  
	  default:
		
		break;
	}
}

 /**
 * Clase que delega las acciones requeridas
 */
abstract class Empresa_Controller {
  	
  private static $EmpAdmin;
  
  static public function alta_empresa()
  {
  	if (self::$EmpAdmin -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
		$pass = md5($_POST['txtUsrPass']);
		
		$retorno = self::$EmpAdmin -> altaEmpresa($_POST['txtUsrNom'], $pass,$_POST['txtNombre'], 
		$_POST['slcciudad'], $_POST['slcpais']);
		header('Location:../vistas/perfil/empresa/perfil-empresa.php');
	}
  }
  
  static public function baja_empresa($id_emp)
  {
  	
  }
  
  static public function setEmpresaAdmin($emp_admin)
  {
  	self::$EmpAdmin = $emp_admin;
  }
}

?>