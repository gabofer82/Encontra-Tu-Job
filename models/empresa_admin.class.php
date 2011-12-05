<?php
/**
 * Este es el controlador para el empresa, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

include_once 'usuario_admin.class.php';
include_once '../dominio/empresa.class.php';

class EmpresaAdmin  extends UsuarioAdmin {

	public function __construct() {
	}

	public function altaEmpresa($nick, $pass, $nom, $ciudad, $pais) {

		if (!$this -> validarNombreUsuario($nick)) {
			return false;
			exit;
		}

		$ciunum = $this -> validarCiudad($ciudad, $pais);
		if (!$ciunum) {
			return false;
			exit;
		}

		$conexion = DataBase::getInstance();
		$id = $this -> calcularID();
		$objE = new Empresa($id, $nick, $pass, $nom, $ciunum, $pais);

		$sentenciaSql = "insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) values ('" . $objE -> getNick() . "','" . 
		$objE -> getPass() . "'," . $objE -> getPais() . ",'" . $objE -> getCiudad() . "')";
			echo var_dump($sentenciaSql);
		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {

			$sentenciaSql = "insert into etj_empresas(emp_id,emp_nom) 
values (" . $objE -> getID() . ",'" . $objE -> getNom() . "')";
			echo var_dump($sentenciaSql);
			$conexion -> ejecutarSentencia($sentenciaSql);

			if ($conexion) {

				return true;
			}
		}
	}

	public function baja($objE) {

		$arrE = obtener();

		foreach ($arrE as $key => $value) {

			if ($objE -> getNom() == $key -> getNom()) {

				$sentenciaSql = <<<SQL
delete from postulantes
where nom=$objP->getNom()
SQL;

				mysql_query($sentenciaSql);
				break;

			}
		}
	}

	public function modificar($objE) {

		$arrE = obtener();

		foreach ($arrE as $key => $value) {

			if ($objE -> getNom() == $key -> getNom()) {

				$sentenciaSql = <<<SQL
delete from postulantes
where nom=$objP->getNom()
SQL;

				mysql_query($sentenciaSql);

				$sentenciaSql = <<<SQL
insert into postulante('nom','pass','mail','sexo','fNac','localidad')
values($objP->getNom(),$objP->getPass(),
$objP->getMail(),$objP->getSexo(),
$objP->getFNac(),$objP->getLoc())
SQL;

				mysql_query($sentenciaSql);

				break;

			}
		}
	}

	
	public function altaReferente($nom,$ape,$mail,$cargo,$tel,$horariocontacto) {
		
		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
				return false;
		}
		$emp = $_SESSION['user'];
		
		if (!isset($nom) or !isset($ape))  {
			return false;
		}
		
		$sentenciaSql = "insert into etj_referente (emp_id,ref_nom,ref_ape,ref_mail,ref_cargo,ref_tel,
		ref_horariocontacto) values
		(".$emp->getID().",'".$nom."','".$ape."','".$mail."','".$cargo."',".$tel.",'".$horariocontacto."')";
		
		//Como sea que se ejecute;
		
	}
	
	public function bajaReferente() {
		
		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
				return false;
		}
		$emp = $_SESSION['user'];
		
		$sentenciaSql = "delete from etj_referente where emp_id=".$emp->getID();
		
	}

	public function obtenerReferente() {
		
		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
				return false;
		}
		$emp = $_SESSION['user'];
		
		$sentenciaSql = "select * from etj_referente where emp_id=".$emp->getID();
				
	}
}
?>