<?php
include __DIR__ . '/../modelos/DataBase.class.php';
class UsuarioAdmin {

	private static $instance = array();

	private function __construct() {
	}

	public static function getInstance() {
		$valorRetorno = null;
		$clase = get_called_class();
		if (!isset(self::$instance[$clase])) {
			self::$instance[$class] = new $clase;
			$valorRetorno = self::$instance[$class];
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

		$sql = <<<SQL
select MAX(usr_id) from etj_usuarios		
SQL;

		return $conexion -> ejecutarSentencia($sql);

	}

	public function validarContrasena($pass1, $pass2) {

		if ($pass1 == $pass2)
			return true;

		return false;

	}

}
?>