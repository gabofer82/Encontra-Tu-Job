<?php
/**
 * Este es el controlador para el postulante, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

include_once 'usuario_admin.class.php';

include_once __DIR__.'/../dominio/Candidato.class.php';

class CandidatoAdmin extends UsuarioAdmin {

	public function __construct() {
	}

	public function altaCandidato($nick, $pass, $nom, $ape, $sexo, $ciu, $pa,$fecha) {

		if (!$this -> validarNombreUsuario($nick)) {
			return false;
		}
		if ($sexo <> "M" and $sexo <> "F") {
			return false;
		}
		$ciunum =$this -> validarCiudad($ciu, $pa);
		if (!$ciunum) {
			return false;
		}	

		$conexion = DataBase::getInstance();
		$id = $this->calcularID();
		

		$c = new Candidato($id,$nick,$pass,$ciunum,$pa,$nom, $ape, $sexo, $fecha);
		$sentenciaSql = "insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) values ('".
		$c->getNick()."','".$c->getPass()."',".$c->getPais().",'".$c->getCiudad()."')";

		$conexion -> ejecutarSentencia($sentenciaSql);
		
		if ($conexion) {
;
		$sentenciaSql = "insert into etj_candidatos (can_id,can_nom,can_ape,can_sexo,can_fNac) 
values (".$c->getID().",'".$c->getNom()."','".$c->getApe()."','".$c->getSexo()."','".$c->getFNac()."')";
echo var_dump($sentenciaSql);		
		$conexion -> ejecutarSentencia($sentenciaSql);
		
		if ($conexion) {
			
			return true;
			
		}
 		
		}

	}

	public function obtenerCandidatos() {

		$conexion = DataBase::getInstance();

		$sentenciaSql = <<<SQL
select * from ejt_usuarios u natural join ejt_candidatos c
on u.usr_id = c.can_id
SQL;

		$resQuery = $conexion -> ejecutarSentencia($sentenciaSql);

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