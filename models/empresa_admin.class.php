<?php
/**
 * Este es el controlador para el empresa, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

 $config = Config::singleton();
$ruta = $config -> get('librerias');
include_once 'usuario_admin.class.php';
include_once $ruta . 'classes/Empresa.class.php';



class EmpresaAdmin  extends UsuarioAdmin {

	public function __construct() {
	}

	public function altaEmpresa($nick, $pass, $nom, $ciudad, $pais, $rubro) {

		if (!$this -> validarNombreUsuario($nick)) {
			return false;
			exit ;
		}

		$ciunum = $this -> validarCiudad($ciudad, $pais);
		if (!$ciunum) {
			return false;
			exit ;
		}
		$rubnum = $this -> validarRubro($rubro);
		if (!$rubnum) {
			return false;
			exit ;
		}

		$conexion = DataBase::getInstance();
		$id = $this -> calcularID();
		$objE = new Empresa($id, $nick, $pass, $nom, $ciunum, $pais, $rubnum);

		$sentenciaSql = "insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) values ('" . $objE -> getNick() . "','" . $objE -> getPass() . "'," . $objE -> getPais() . ",'" . $objE -> getCiudad() . "')";
		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {

			$sentenciaSql = "insert into etj_empresas(emp_id,emp_nom,rub_id) 
values (" . $objE -> getID() . ",'" . $objE -> getNom() . "'," . $objE -> getRubro() . ")";
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

	public function modEmpresa($nom, $razon, $rut, $dir, $web, $tel, $ciu, $pa, $foto) {
		session_start();
		if (!isset($_SESSION['user'])) {
			return false;
		}
		$emp = $_SESSION['user'];

		if (isset($nom)) {
			$emp -> setNom($nom);
		}
		if (isset($razon)) {
			$emp -> setRazonSocial($razon);
		}
		if (isset($rut)) {
			$emp -> setRUT($rut);
		}
		if (isset($dir)) {
			$emp -> setDir($dir);
		}
		if (isset($web)) {
			$emp -> setSitoWeb($web);
		}
		if (isset($tel)) {
			$emp -> setTel($tel);
		}
		if (isset($ciu)) {
			$emp -> setCiudad($ciu);
		}
		if (isset($pa)) {
			$emp -> setPais($pa);
		}
		if (isset($foto)) {
			$emp -> setLogo($foto);
		}

				$conexion = DataBase::getInstance();
		
		$sentenciaSql = "update etj_usuarios
		set usr_nick='" . $emp -> getNick() . "', usr_pass='" . $emp -> getPass() . "', pa_id=" . $emp -> getPais() . ", ciu_id=" . $emp -> getCiudad() . "
		where usr_id =" . $emp -> getID() . "";

		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {

			$sentenciaSql = "update etj_empresas
		set emp_nom='" . $emp -> getNom() . "',emp_razonsocial='" . $emp -> getRazonSocial() . "',emp_rut=" . $emp -> getRUT() . ",emp_logo='" . $emp -> getLogo() . "',emp_direccion='" . $emp -> getDir() . "',emp_web='" . $emp -> getSitioWeb() . "',emp_tel=" . $emp -> getTel() . "
		where emp_id=" . $emp -> getID() . "";

			$conexion -> ejecutarSentencia($sentenciaSql);
			if ($conexion) {

				return true;

			}

		}
	}

	public function altaReferente($nom, $ape, $mail, $cargo, $tel, $horariocontacto) {

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}
		$emp = $_SESSION['user'];

		if (!isset($nom) or !isset($ape)) {
			return false;
		}

		$sentenciaSql = "insert into etj_referente (emp_id,ref_nom,ref_ape,ref_mail,ref_cargo,ref_tel,
		ref_horariocontacto) values
		(" . $emp -> getID() . ",'" . $nom . "','" . $ape . "','" . $mail . "','" . $cargo . "'," . $tel . ",'" . $horariocontacto . "')";

		//Como sea que se ejecute;

	}

	public function bajaReferente() {

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}
		$emp = $_SESSION['user'];

		$sentenciaSql = "delete from etj_referente where emp_id=" . $emp -> getID();

	}

	public function obtenerReferente() {

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}
		$emp = $_SESSION['user'];

		$sentenciaSql = "select * from etj_referente where emp_id=" . $emp -> getID();

	}

}
?>