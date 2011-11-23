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
		echo "<script>alert(\"llegamos? altac\")</script>";
echo var_dump($pa);

		if (!$this -> validarNombreUsuario($nick)) {
			return false;
		}
		if ($sexo <> "M" and $sexo <> "F") {
			return false;
		}
		if (!$this -> validarCiudad($ciu, $pa)) {
			return false;
		}
		echo "<script>alert(\"despues de volver del validar ciudad\")</script>";
		$conexion = DataBase::getInstance();
		
		$id = $this->calcularID();
				echo "<script>alert(\"llegamos? a\")</script>";
		$c = new Candidato($id,$nick,$pass,$ciu,$pa,$nom, $ape, $sexo, $fecha);
		echo "<script>alert(\"llegamos?\")</script>";
		$sentenciaSql = <<<SQL
insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) 
values ($c->getNick(),$c->getPass(),$c->getPais(),$c->getCiudad())
SQL;

		$conexion -> ejecutarSentencia($sentenciaSql);
		
		if ($conexion) {

		$sentenciaSql = <<<SQL
insert into etj_candidatos (can_id,can_nom,can_ape,can_fNac,can_sexo) 
values ($c->getID(),'$c->getNom()','$c->getApe()','$c->getSexo()','$c->getFNac()')
SQL;
		
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