<?php
/**
 * Este es el controlador para el postulante, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

include_once 'usuario_admin.class.php';
include_once __DIR__ . '/../dominio/Candidato.class.php';
include_once __DIR__. '/../dominio/Curriculum.class.php';

class CandidatoAdmin extends UsuarioAdmin {

	public function __construct() {
	}

	public function altaCandidato($nick, $pass, $nom, $ape, $sexo, $ciu, $pa, $fecha) {

		if (!$this -> validarNombreUsuario($nick)) {
			return false;
		}
		if ($sexo <> "M" and $sexo <> "F") {
			return false;
		}
		$ciunum = $this -> validarCiudad($ciu, $pa);
		if (!$ciunum) {
			return false;
		}

		$conexion = DataBase::getInstance();
		$id = $this -> calcularID();

		$c = new Candidato($id, $nick, $pass, $ciunum, $pa, $nom, $ape, $sexo, $fecha);
		$sentenciaSql = "insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) values ('" . $c -> getNick() . "','" . $c -> getPass() . "'," . $c -> getPais() . ",'" . $c -> getCiudad() . "')";

		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {
			$sentenciaSql = "insert into etj_candidatos (can_id,can_nom,can_ape,can_sexo,can_fNac) 
values (" . $c -> getID() . ",'" . $c -> getNom() . "','" . $c -> getApe() . "','" . $c -> getSexo() . "','" . $c -> getFNac() . "')";
			$conexion -> ejecutarSentencia($sentenciaSql);

			if ($conexion) {

				return true;

			}

		}

	}

	public function modCandidato($pass, $nom, $ape, $sexo, $ciudad, $pais, $fecha) {

		session_start();
		echo "aca llegamos antes de user";
		if (!isset($_SESSION['user'])) {
			return false;
		}
		echo "aca llegamos antes de sexo";
		if ($sexo <> "M" and $sexo <> "F") {
			return false;
		}
		echo "aca llegamos despues de sexo?";
		echo var_dump($ciudad);
		echo var_dump($pais);

		$ciunum = $this -> validarCiudad($ciudad, $pais);
		if (!$ciunum) {
			return false;
		}
		echo var_dump($pais);
		echo var_dump($sexo);
		echo "Aca despues de validar ciudad?";
		$conexion = DataBase::getInstance();
		$c = $_SESSION['user'];
		$c -> setPass($pass);
		$c -> setNom($nom);
		$c -> setApe($ape);
		$c -> setSexo($sexo);
		$c -> setCiudad($ciunum);
		$c -> setPais($pais);
		$c -> setFNac($fecha);
		echo var_dump($c);

		echo "Aca?";
		$sentenciaSql = "update etj_usuarios
		set usr_nick='" . $c -> getNick() . "', usr_pass='" . $c -> getPass() . "', pa_id=" . $c -> getPais() . ", ciu_id=" . $c -> getCiudad() . "
		where usr_id =" . $c -> getID() . "";
		echo var_dump($sentenciaSql);
		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {
			$sentenciaSql = "update etj_candidatos
		set can_nom='" . $c -> getNom() . "', can_ape='" . $c -> getApe() . "', can_sexo='" . $c -> getSexo() . "', can_fNac= " . $c -> getFNac() . "
		where can_id =" . $c -> getID() . "";
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

	public function altaCurriculum($docNum, $docTipo, $Mail, $EdoCivil, $Dir, 
	$CP, $Tel, $foto, $puesto, $estudios, $laborales, $idioma, $nivel, $subs) {
			
		if (!isset($docNum)){
			return FALSE;
		}		
		if (!isset($Mail)) {
			return false;
		}	
		if (!isset($estudios)){
			return false;
		}
		if (!isset($laborales)){
			return false;
		}
		if (!isset($idioma)){
			return false;
		}
		if (!isset($subs)){
			return false;	
		}
		$img = subirImagen(); 
		if ($img) {
			return false; 
		}
		
		$idmid = devolverIdmId($idioma);
		$idiomas = array($idmid => $nivel);
		
		$conexion = DataBase::getInstance();
		session_start();
		
		$usrid = $_SESSION['user'] ->getID();
		
		$curr = new Curriculum($docNum,$docTipo, $Mail, $estudios, $laborales, $idiomas, $subs);
		$curr->setECivil =$EdoCivil;
		$curr->setDireccion =$Dir;
		$curr->setCodigoPostal =$CP;
		$curr->setTelefono =$Tel;
		$curr->setPuestoDeseado =$puesto;
		$curr->setFoto = $img;
		
		$sentenciaSql = "insert into etj_curriculum
		values (".$usrid.",'".$curr->getTipoDoc."',".$curr->getDocumento.",".$curr->getCodigoPostal.",".
		$curr->getTelefono.",'".	$curr->getMail."','".$curr->getFoto."','".$curr->getEAcademicas."','".
		$curr->getExLaboral."','".$curr->getPuestoDeseado."','".$curr->getSubscribir."')";
		
		$conexion -> ejecutarSentencia($sentenciaSql);
		
		$sentenciaSql = "insert into etj_habla
		values(".$usrid.",".$idmid.",".$nivel.")";

		$conexion -> ejecutarSentencia($sentenciaSql);
		

	}

}
?>