<?php
/**
 * Este es el controlador para el empresa, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */
class EmpresaAdmin {

	private static $instance;

	private function __construct($argument) {
		//algo
	}

	public static function getInstance() {
		if (isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function alta($objE) {

		$arrE = obtener();

		foreach ($arrE as $key => $value) {

			if ($objE -> getNom() != $key -> getNom()) {

				$sentenciaSql = <<<SQL
insert into postulante('nom','pass','mail','','localidad')
values($objP->getNom(),$objP->getPass(),
$objP->getMail(),$objP->getSexo(),
$objP->getFNac(),$objP->getLoc())
SQL;

				mysql_query($sentenciaSql);
				break;
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

	public function obtener() {

		$sentenciaSql = <<<SQL
select * from Empresas
SQL;

		$resQuery = mysql_query($sentenciaSql);

		if ($resQuery) {

			$arrEmp;
			$cont = 0;

			while ($dato = mysql_fetch_assoc($resQuery)) {

				$objE = $dato['nom'] . "," . $dato['pass'] . "," . $dato['mail'] . "," . $dato['sexo'] . "," . $dato['fNac'] . "," . $dato['localidad'];

				$arrPost[$cont] = $objP;
				$cont++;

			}

			return $arrEmp or die("No existen elementos");

		}

	}

}
?>