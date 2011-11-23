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

		$dato = mysql_fetch_array($restultado);

		return $dato;

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

		if ($restultado != null) {

			return false;

		}

		return true;

	}

	public function validarCiudad($ciudad, $pais) {

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
select * from 
etj_ciudades
where ciu_nom = '$ciudad' and pa_id = $pais
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);

		if (mysql_num_rows($resultado) > 0) {

			return true;

		}

		return false;

	}

}
?>