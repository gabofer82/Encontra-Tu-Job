<?php

include __DIR__ . '/../persistencia/DataBase.class.php';
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

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
SELECT ciu_nom
FROM etj_ciudades
WHERE pa_id =1
SQL;

		$restultado = $conexion -> ejecutarSentencia($sql);

		if (mysql_num_rows($restultado) > 0) {

			$cont = mysql_num_rows($restultado);
			$arrCiu;
			while ($dato = mysql_fetch_array($restultado)) {

				$arrCiu[$cont] = $dato[0];
				$cont--;

			}

		} mysql_free_result($restultado);
		return $arrCiu;
	}

	public function calcularID() {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select MAX(usr_id) from etj_usuarios		
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);

		$dato = mysql_fetch_array($resultado);

		return $dato[0] + 1;

	}

	public function validarContrasena($pass1, $pass2) {

		if ($pass1 == $pass2)
			return true;

		return false;

	}

	public function validarNombreUsuario($nick) {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select usr_nick from 
etj_usuarios
where usr_nick = '$nick'
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);

		if ($resultado != null) {

			return false;

		}

		return true;

	}

	public function validarCiudad($ciudad, $pais) {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select ciu_id from 
etj_ciudades
where ciu_nom = '$ciudad' and pa_id = $pais
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);

		if (mysql_num_rows($resultado) > 0) {

			$ciu = mysql_fetch_array($resultado);

			return $ciu[0];

		}

		return false;

	}

	function login_usuario($nick, $pass) {
		$conexion = DataBase::getInstance();

		$sql = <<<SQL
SELECT * 
FROM etj_usuarios
WHERE  `usr_nick` =  '$nick'
AND  `usr_pass` =  '$pass'
SQL;
		$resultado = $conexion -> ejecutarSentencia($sql);
		$datoUsr = mysql_fetch_assoc($resultado);

		if ($datoUsr) {

			$sql = "SELECT * FROM etj_candidatos WHERE `can_id` = " . $datoUsr['usr_id'];
			$resultado = $conexion -> ejecutarSentencia($sql);
			if ($conexion -> getNumFilas() > 0) {
				include_once __DIR__ . '/../dominio/Candidato.class.php';
				$datoCan = mysql_fetch_assoc($resultado);
				$can = new Candidato($datoUsr['usr_id'], $datoUsr['usr_nick'], $datoUsr['usr_pass'], $datoUsr['ciu_id'], $datoUsr['pa_id'], $datoCan['can_nom'], $datoCan['can_ape'], $datoCan['can_sexo'], $datoCan['can_fNac']);
				session_start();
				$_SESSION['user'] = $can;
				return true;

			} else {

				$sql = "SELECT * FROM etj_empresas WHERE `emp_id` = " . $datoUsr['usr_id'];
				$resultado = $conexion -> ejecutarSentencia($sql);

				if ($conexion -> getNumFilas() > 0) {
					include_once __DIR__ . '/../dominio/Empresa.class.php';
					$datoCan = mysql_fetch_assoc($resultado);
					$emp = new Empresa($datoUsr['usr_id'], $datoUsr['usr_nick'], $datoUsr['usr_pass'], $datoUsr['ciu_id'], $datoUsr['pa_id'], $datoCan['emp_nom']);
					session_start();
					$_SESSION['user'] = $emp;
					return true;
				}
			}

		} else {
			return false;
		}

	}

	public function obtenerIdiomas() {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select idm_nom from 
etj_idiomas
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);
		$cont = mysql_num_rows($resultado);
		if (mysql_num_rows($resultado) > 0) {

			$arrIdio;
			while ($dato = mysql_fetch_array($resultado)) {

				$arrIdio[$cont] = $dato[0];
				$cont--;

			}

		}mysql_free_result($resultado);
		return $arrIdio;

	}

	public function devolverIdmId($idioma) {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select idm_id from 
etj_idiomas
where idm_nom = '$idioma'
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);

		if (mysql_num_rows($resultado) > 0) {

			$idm = mysql_fetch_array($resultado);

			return $idm[0];

		}

		return true;

	}

	public function subirImagen() {

		$conexion = DataBase::getInstance();

		$vurl = "";
		if (isset($_FILES['fileFoto']['name'])) {
			$vurl = $_FILES['fileFoto']['name'];
		}

		if ($vurl != "") {
			$tmp_url = __DIR__.'/../user_img/' . basename($vurl);
			if (move_uploaded_file($_FILES['fileFoto']['tmp_name'], $tmp_url)) {
				echo '<script>alert ("La imagen ser ha ingresado correctamente");</script>';
				return $tmp_url;

			} else {
				return false;
				echo '<script>alert ("Error, Su video no ha sido ingresado. Intente otra vez!");</script>';
			}
		}

	}
	
	public function obtenerNombreCiudad($ciudad,$pais) {
	
		$conexion = DataBase::getInstance();
		
			$sql = <<<SQL
select ciu_nom from 
etj_ciudades
where ciu_id = $ciudad and pa_id = $pais
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);
		
		if (mysql_num_rows($resultado) > 0) {

			$ciu = mysql_fetch_array($resultado);

			return $ciu[0];

		}

		return true;

	}	
	
	public function obtenerNombreIdioma($idioma) {
	
		$conexion = DataBase::getInstance();
		
			$sql = <<<SQL
select idm_nom from 
etj_idiomas
where idm_id = $idioma
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);
		
		if (mysql_num_rows($resultado) > 0) {

			$idm = mysql_fetch_array($resultado);

			return $idm[0];

		}

		return true;

	}

}
?>