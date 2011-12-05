<?php

$config = Config::singleton();
$ruta = $config -> get('librerias');

require_once $ruta . "/SPDO.php";

class UsuarioAdmin {

	private static $instance = array();

	private function __construct() {
	}

	public static function getInstance() {
		$valorRetorno = null;
		$clase = get_called_class();
		if (!isset(self::$instance[$clase])) {
			self::$instance[$clase] = new $clase;
			$valorRetorno = self::$instance[$clase];
		}

		return $valorRetorno;
	}

	public function obtenerCiudades() {

		$conexion = SPDO::singleton();

		$sql = "SELECT * FROM etj_ciudades WHERE pa_id = 1";

		$resultado = $conexion -> query($sql);
		$arrCiu;
		foreach ($resultado as $value) {
			$arrCiu[] = $value[ciu_nom];
		}

		if ($arrCiu) {
			return $arrCiu;

		}
		return false;

	}

	public function calcularID() {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select MAX(usr_id) from etj_usuarios		
SQL;

		$resultado = $conexion -> query($sql);

		foreach ($resultado as $value) {
			$id = $value;
			return $id + 1;
		}

	}

	public function validarContrasena($pass1, $pass2) {

		if ($pass1 == $pass2)
			return true;

		return false;

	}

	public function validarNombreUsuario($nick) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select usr_nick from 
etj_usuarios
where usr_nick = '$nick'
SQL;

		$resultado = $conexion -> query($sql);

		if ($resultado != null) {

			return false;

		}

		return true;

	}

	public function validarCiudad($ciudad, $pais) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select ciu_id from 
etj_ciudades
where ciu_nom = '$ciudad' and pa_id = $pais
SQL;

		$resultado = $conexion -> query($sql);

		foreach ($resultado as $value) {
			$ciu = $value;
		}
		if ($ciu) {
			return $ciu;

		}
		return false;
	}

	function login_usuario($nick, $pass) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
SELECT * 
FROM etj_usuarios
WHERE  `usr_nick` =  '$nick'
AND  `usr_pass` =  '$pass'
SQL;
		$resultado = $conexion -> query($sql);

		foreach ($resultado as $value) {
			$datoUsr = $value;
		}

		if ($datoUsr) {

			$sql = "SELECT * FROM etj_candidatos WHERE `can_id` = " . $datoUsr['usr_id'];
			$resultado = $conexion -> query($sql);

			include_once __DIR__ . '/../dominio/Candidato.class.php';
			$can;
			foreach ($resultado as $value) {
				$can = new Candidato($datoUsr['usr_id'], $datoUsr['usr_nick'], $datoUsr['usr_pass'], $datoUsr['ciu_id'], $datoUsr['pa_id'], $datoCan['can_nom'], $datoCan['can_ape'], $datoCan['can_sexo'], $datoCan['can_fNac']);
			}
			if ($can instanceof Candidato) {
				$_SESSION['user'] = $can;
				return true;
			}
		} else {

			$sql = "SELECT * FROM etj_empresas WHERE `emp_id` = " . $datoUsr['usr_id'];
			$resultado = $conexion -> query($sql);

			include_once __DIR__ . '/../dominio/Empresa.class.php';

			$emp;
			foreach ($resultado as $value) {
				$emp = new Empresa($datoUsr['usr_id'], $datoUsr['usr_nick'], $datoUsr['usr_pass'], $datoUsr['ciu_id'], $datoUsr['pa_id'], $datoCan['emp_nom']);
			}
			$_SESSION['user'] = $emp;
			return true;
		}
	}

	public function obtenerIdiomas() {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select idm_nom from 
etj_idiomas
SQL;

		$resultado = $conexion -> query($sql);
		foreach ($resultado as $value) {
			$arrIdio[] = $value[idm_nom];
		}
		if ($arrIdio) {
			return $arrIdio;

		}
		return false;

	}

	public function devolverIdmId($idioma) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select idm_id from 
etj_idiomas
where idm_nom = '$idioma'
SQL;

		$resultado = $conexion -> query($sql);

		foreach ($resultado as $value) {
			$idm = $value[idm_nom];
		}
		if ($idm) {
			return $idm[0];

		}
		return false;
	}

	public function subirImagen() {

		$conexion = SPDO::singleton();

		$vurl = "";
		if (isset($_FILES['fileFoto']['name'])) {
			$vurl = $_FILES['fileFoto']['name'];
		}

		if ($vurl != "") {
			$tmp_url = __DIR__ . '/../user_img/' . basename($vurl);
			if (move_uploaded_file($_FILES['fileFoto']['tmp_name'], $tmp_url)) {
				echo '<script>alert ("La imagen ser ha ingresado correctamente");</script>';
				return $tmp_url;

			} else {
				return false;
				echo '<script>alert ("Error, Su video no ha sido ingresado. Intente otra vez!");</script>';
			}
		}

	}

	public function obtenerNombreCiudad($ciudad, $pais) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select ciu_nom from 
etj_ciudades
where ciu_id = $ciudad and pa_id = $pais
SQL;

		$resultado = $conexion -> query($sql);

		foreach ($resultado as $value) {
			$ciu = $value[idm_nom];
		}
		if ($ciu) {
			return $ciu[0];

		}
		return false;

	}

	public function obtenerNombreIdioma($idioma) {

		$conexion = SPDO::singleton();

		$sql = <<<SQL
select idm_nom from 
etj_idiomas
where idm_id = $idioma
SQL;

		$resultado = $conexion -> query($sql);
		foreach ($resultado as $value) {
			$idm = $value[idm_nom];
		}
		if ($idm) {
			return $idm[0];

		}
		return false;

	}

}
?>