<?php
/**
 * Este es el controlador para el postulante, se encarga de
 * todas las cosas tipo alta, baja, modificacion, etc
 * Implementa Singleton Pattern
 */

include_once 'usuario_admin.class.php';
include_once __DIR__ . '/../dominio/Candidato.class.php';
include_once __DIR__ . '/../dominio/Curriculum.class.php';

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

		if (!isset($_SESSION['user'])) {
			return false;
		}
		$c = $_SESSION['user'];

		if ($sexo <> "M" and $sexo <> "F") {
			return false;
		}
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

	public function altaCurriculum($docNum, $docTipo, $Mail, $EdoCivil, $Dir, $CP, $Tel, $foto, $puesto, $estudios, $laborales, $idioma, $nivel, $subs) {
		session_start();
		if (!isset($_SESSION['curr'])) {
			if (!isset($docNum)) {
				return FALSE;
			}
			if (!isset($Mail)) {
				return false;
			}
			if (!isset($estudios)) {
				return false;
			}
			if (!isset($laborales)) {
				return false;
			}
			if (!isset($idioma)) {
				return false;
			}
			if (!isset($subs)) {
				return false;
			}
			$img = $this -> subirImagen();
			if (!$img) {
				return false;
			}

			$idmid = $this -> devolverIdmId($idioma);
			if (!$idmid) {
				return false;
			}

			$idiomas = array($idmid => $nivel);

			$conexion = DataBase::getInstance();

			$usrid = $_SESSION['user'] -> getID();

			$curr = new Curriculum($docNum, $docTipo, $Mail, $estudios, $laborales, $idiomas, $subs);
			$curr -> setECivil($EdoCivil);
			$curr -> setDireccion($Dir);
			$curr -> setCodigoPostal($CP);
			$curr -> setTelefono($Tel);
			$curr -> setPuestoDeseado($puesto);
			$curr -> setFoto($img);
			$sentenciaSql = "insert into etj_curriculum
		values (" . $usrid . ",'" . $curr -> getTipoDoc() . "'," . $curr -> getDocumento() . "," . $curr -> getECivil . "," . $curr -> getDireccion . "," . $curr -> getCodigoPostal() . "," . $curr -> getTelefono() . ",'" . $curr -> getMail() . "','" . $curr -> getFoto() . "','" . $curr -> getEAcademicas() . "','" . $curr -> getExLaboral() . "','" . $curr -> getPuestoDeseado() . "','" . $curr -> getSubscribir() . "')";
			$recurso = $conexion -> ejecutarSentencia($sentenciaSql);
			echo "<script>alert(\"" . var_dump($sentenciaSql) . "\");</script>";
			if ($recurso) {

				$sentenciaSql = "insert into etj_habla
		values(" . $usrid . "," . $idmid . ",'" . $nivel . "')";
				echo "<script>alert(\"" . var_dump($sentenciaSql) . "\");</script>";
				$recurso = $conexion -> ejecutarSentencia($sentenciaSql);

				if ($recurso) {

					return true;

				}
			}
		}
	}

	public function modCurriculum($docNum, $docTipo, $Mail, $EdoCivil, $Dir, $CP, $Tel, $foto, $puesto, $estudios, $laborales, $idioma, $nivel, $subs) {

		$conexion = DataBase::getInstance();
		session_start();
		if (isset($_SESSION['curr'])) {
			$usrNum = $_SESSION['user'] -> getID();
			$curr = $_SESSION['curr'];
			$idmRepetido = "SinIngresar";
			$idmid;
			if (isset($docNum)) {
				$curr -> setDocumento($docNum);
			}
			if (isset($docTipo)) {
				$curr -> set($docTipo);
			}
			if (isset($Mail)) {
				$curr -> setMail($Mail);
			}
			if (isset($EdoCivil)) {
				$curr -> setECivil($EdoCivil);
			}
			if (isset($Dir)) {
				$curr -> setDireccion($Dir);
			}
			if (isset($CP)) {
				$curr -> setCodigoPostal($CP);
			}
			if (isset($Tel)) {
				$curr -> setTelefono($Tel);
			}
			if (isset($foto)) {
				$img = $this -> subirImagen();
				if (!$img) {
					return false;
				}
				$curr -> setFoto($img);
			}
			if (isset($puesto)) {
				$curr -> setPuestoDeseado($puesto);
			}
			if (isset($estudios)) {
				$curr -> setEAcademicos($estudios);
			}
			if (isset($laborales)) {
				$curr -> setExLaboral($laborales);
			}
			if (isset($idioma) and isset($nivel)) {

				$idmid = $this -> devolverIdmId($idioma);
				if (!$idmid) {
					return false;
				}

				$idiomasCurr = $curr -> getIdiomas();
				foreach ($idiomasCurr as $idioma => $lvl) {

					if ($idioma == $idmid) {
						$idmRepetido = "Si";
					}
					$idiomasCurr[$idmid] = $nivel;
					$curr -> setIdiomas($idiomasCurr);
					$idmRepetido = "No";
				}

			}
			if (isset($subs)) {
				$curr -> setSubscribir($subs);
			}

			$sentenciaSql = "update etj_curriculum
		set cur_doctipo='" . $curr -> getTipoDoc() . "',cur_docnum=" . $curr -> getDocumento() . ",
		cur_edocivil='" . $curr -> getECivil() . "',cur_dir='" . $curr -> getDireccion() . "',cur_cpost=" . $curr -> getCodigoPostal() . ",
		cur_tel=" . $curr -> getTelefono() . ",cur_mail='" . $curr -> getMail() . "',cur_foto='" . $curr -> getFoto() . "',
		cur_academicos='" . $curr -> getEAcademicas() . "',cur_laborales='" . $curr -> getExLaboral() . "',cur_puesto='" . $curr -> getPuestoDeseado() . "',cur_subscribir='" . $curr -> getSubscribir() . "'
		where can_id =" . $usrNum;
			$recurso = $conexion -> ejecutarSentencia($sentenciaSql);

			if ($recurso and $idmRepetido = "Si") {

				$sentenciaSql = "update etj_habla
		set idm_id=" . $idmid . ",nivel='" . $nivel . "'where can_id =" . $usrNum;
				echo "<script>alert(\"" . var_dump($sentenciaSql) . "\");</script>";
				$recurso = $conexion -> ejecutarSentencia($sentenciaSql);

			} else if ($recurso and $idmRepetido = "No") {

				$sentenciaSql = "insert into etj_habla
		values(" . $usrNum . "," . $idmid . ",'" . $nivel . "')";
				echo "<script>alert(\"" . var_dump($sentenciaSql) . "\");</script>";
				$recurso = $conexion -> ejecutarSentencia($sentenciaSql);

			}
			if ($recurso) {

				return true;

			}
		}
	}

	public function tieneCurriculum() {

		$conexion = DataBase::getInstance();
		session_start();
		if (!isset($_SESSION['curr'])) {

			$sentenciaSql = "select * from etj_curriculum where can_id =" . $_SESSION['user'] -> getID();
echo var_dump($sentenciaSql);
			$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

			if ($conexion -> getNumFilas() > 0) {

				$dato = mysql_fetch_array($resultado);

				$DocTipo = $dato[0];
				$DocNum = $dato[1];
				$edocivil = $dato[2];
				$dir = $dato[3];
				$CP = $dato[4];
				$Tel = $dato[5];
				$Mail = $dato[6];
				$Foto = $dato[7];
				$Academico = $dato[8];
				$Laboral = $dato[9];
				$Puesto = $dato[10];
				$Sub = $dato[11];

				$sentenciaSql = "select * from etj_habla where can_id =" . $_SESSION['user'] -> getID();

				$recurso = $conexion -> ejecutarSentencia($sentenciaSql);

				if ($conexion -> getNumFilas() > 0) {
					$idiomas;
					while ($dato = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
						$idiomas['idm_id'] = 'nivel';
					}
					$curr = new Curriculum($DocNum, $DocTipo, $Mail, $Academico, $Laboral, $idiomas, $Sub);
					$curr -> setECivil($edocivil);
					$curr -> setDireccion($dir);
					$curr -> setCodigoPostal($CP);
					$curr -> setTelefono($Tel);
					$curr -> setPuestoDeseado($Puesto);
					$curr -> setFoto($Foto);

					$_SESSION['curr'] = serialize($curr);
					return true;
				}
			}
			return false;
		}
		return true;
	}
}
?>