<?php
/**
 * Este es el controlador para el postulante, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

class PostulanteAdmin {

	private static $instance;
	private $conexion;

	private function __construct() {

		$conexion = $GLOBALS['conexion'];

	}

	public static function getInstance() {
		if (isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function obtener() {

		$sentenciaSql = <<<SQL
select * from ejt_usuarios u natural join ejt_candidatos c
on u.usr_id = c.can_id
SQL;

		$resQuery = $conexion -> ejecutar($sentenciaSql);

		if ($resQuery) {

			$arrPost;

			while ($dato = mysql_fetch_assoc($resQuery)) {
				$objP = new Candidato(dato);
				
				$arrPost[$cont] = $objP;

			}

			return $arrPost or die("No existen elementos");

		}

	}

}
?>