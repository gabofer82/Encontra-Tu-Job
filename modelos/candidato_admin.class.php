<?php
/**
 * Este es el controlador para el postulante, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */
include_once 'usuario_admin.class.php';

class CandidatoAdmin extends UsuarioAdmin {



	public function __construct() {}

	public function altaCandidatos($nick,$pass,$repass,$nom,$ape,$sexo,$año,$mes,$dia,$ciudad,$pais) {
		
		$fechaN = 
		
		
	}


	public function obtenerCandidatos() {

		$conexion = DataBase::getInstance();

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