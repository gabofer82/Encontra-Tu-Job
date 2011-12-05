<?php

/**
 *
 */

include_once __DIR__ . '/../classes/Demandas.class.php';

class DemandaAdmin {

	function __construct() {
	}

	public function altaDemanda($titulo, $refer, $desc, $perfil, $cargo, $horario, $vacantes, $estudios, $idioma, $conocimientos, $fechaPubli, $fechaCierre) {

		session_start();

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}

		$emp = $_SESSION['user'];
		$objU = UsuarioAdmin::getInstance();
		$conexion = DataBase::getInstance();

		if (!isset($titulo)) {
			return false;
		}
		if (!isset($refer)) {
			return false;
		}
		if (!isset($desc)) {
			return false;
		}
		if (!isset($horario)) {
			return false;
		}
		if (!isset($vacantes)) {
			return false;
		}
		if (!isset($estudios)) {
			return false;
		}
		$dem = new Demanda($titulo, $emp, $refer, $desc, $horario, $vacantes, $estudios, 0);
		if (isset($perfil)) {
			$dem -> setPerfilLaboral($perfil);
		}
		if (isset($cargo)) {
			$dem -> setCargo($cargo);
		}
		if (isset($idioma)) {
			$idmId = $objU -> devolverIdmId($idioma);
			$dem -> set($idmId);
		}
		if (isset($conocimientos)) {
			$dem -> setConocimientos($conocimientos);
		}
		if (isset($fechaPubli)) {
			$dem -> setFPubli($fechaPubli);
		}
		if (isset($fechaCierre)) {
			$dem -> setFCierre($fechaCierre);
		}

		$sentenciaSql = "insert into etj_demandas (emp_id,dem_titulo,dem_referencia,dem_descripcion,dem_perfil,
		dem_cargo,dem_horario,dem_vacantes,dem_nivelest,idm_id,dem_conocimientos,dem_fechapubli,dem_fechacierre) 
		values (" . $emp -> getID() . ",'" . $dem -> getTitulo() . "','" . $dem -> getReferecnia() . "','" . $dem -> getDescripcion() . "','" . $dem -> getPerfil() . "','" . $dem -> getCargo() . "','" . $dem -> getHorario() . "'," . $dem -> getVacantes() . ",'" . $dem -> getNivelEstudio() . "'," . $dem -> getIdioma() . ",'" . $dem -> getConocimientos() . "','" . $dem -> getFechaPublicada() . "','" . $dem -> getFechaCierre . "')";

		$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

		if ($resultado) {

			return true;

		}

	}

	public function modDemanda($titulo, $refer, $desc, $perfil, $cargo, $horario, $vacantes, $estudios, $idioma, $conocimientos, $fechaPubli, $fechaCierre) {

		session_start();
		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}

		$emp = $_SESSION['user'];
		$objU = UsuarioAdmin::getInstance();
		$conexion = DataBase::getInstance();

		if (!isset($_SESSION['demanda'])) {
			return false;
		}

		$dem = $_SESSION['demanda'];

		if (isset($titulo)) {
			$dem -> setTitulo($titulo);
		}
		if (isset($refer)) {
			$dem -> setReferencia($refer);
		}
		if (isset($desc)) {
			$dem -> setDescripcion($desc);
		}
		if (isset($horario)) {
			$dem -> setHorario($horario);
		}
		if (isset($vacantes)) {
			$dem -> setVacantes($vacantes);
		}
		if (isset($estudios)) {
			$dem -> setNivelEstudios($estudios);
		}
		if (isset($perfil)) {
			$dem -> setPerfilLaboral($perfil);
		}
		if (isset($cargo)) {
			$dem -> setCargo($cargo);
		}
		if (isset($idioma)) {
			$idmId = $objU -> devolverIdmId($idioma);
			$dem -> set($idmId);
		}
		if (isset($conocimientos)) {
			$dem -> setConocimientos($conocimientos);
		}
		if (isset($fechaPubli)) {
			$dem -> setFPubli($fechaPubli);
		}
		if (isset($fechaCierre)) {
			$dem -> setFCierre($fechaCierre);
		}

		$sentenciaSql = "update etj_demandas
		set dem_titulo='" . $dem -> getTitulo() . "',dem_referencia='" . $dem -> getReferecnia() . "',dem_descripcion='" . $dem -> getDescripcion() . "',dem_perfil='" . $dem -> getPerfil() . "',dem_cargo='" . $dem -> getCargo() . "',dem_horario='" . $dem -> getHorario() . "',dem_vacantes=" . $dem -> getVacantes() . ",dem_nivelest='" . $dem -> getNivelEstudio() . "',idm_id=" . $dem -> getIdioma() . ",		
		dem_conocimientos='" . $dem -> getConocimientos() . "',	dem_fechapubli='" . $dem -> getFechaPublicada() . "',dem_fechacierre='" . $dem -> getFechaCierre() . "'
		where dem_id=" . $dem -> getID() . " and emp_id=" . $emp -> getID();

		$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

		if ($resultado) {

			return true;

		}

	}

	public function bajaDemanda($dem) {

		session_start();

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Empresa) {
			return false;
		}

		$emp = $_SESSION['user'];
		$objU = UsuarioAdmin::getInstance();
		$conexion = DataBase::getInstance();

		$sentenciaSql = "update etj_demandas set dem_activa = 0 
		where dem_id=" . $dem -> getID() . " and emp_id=" . $emp -> getID();

		$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

		if ($resultado) {

			return true;

		}

	}

	public function PostularseDemanda($dem) {

		session_start();

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Candidato) {
			return false;
		}

		$can = $_SESSION['user'];
		$conexion = DataBase::getInstance();

		$sentenciaSql = "insert into etj_postulado
		values (" . $can -> getID() . "," . $dem -> getID() . "," . $dem -> getEmpresa() . ",'" . date(Y - m - d) . "')";

		$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

		if ($resultado) {

			return true;

		}

	}

	public function BajaPostulado($dem) {

		session_start();

		if (!isset($_SESSION['user']) or !$_SESSION['user'] instanceof Candidato) {
			return false;
		}

		$can = $_SESSION['user'];
		$conexion = DataBase::getInstance();

		$sentenciaSql = "delete from etj_postulado where can_id=" . $can -> getID();

		$resultado = $conexion -> ejecutarSentencia($sentenciaSql);

		if ($resultado) {

			return true;

		}

	}

	public function ObtenerUltimasDemandas() {

		//$this -> actualizarDemandas();

		$conexion = DataBase::getInstance();

		$sql = <<<SQL
SELECT * FROM ultimasdemandasactivas
SQL;

		$resultado = $conexion -> ejecutarSentencia($sql);
		if (mysql_num_rows($resultado) > 0) {

			$arrDemandas;
			while ($dato = mysql_fetch_array($resultado)) {
				$dem = new Demandas($dato[2], $dato[0], $dato[3], $dato[4], $dato[7], $dato[8], $dato[9], 0);
				$arrDemandas[] = $dem;
			}

		}mysql_free_result($resultado);
		return $arrDemandas;

	}

	public function obtenerDemandasPorRubro($rubro) {

		$objU = UsuarioAdmin::getInstance();

		$rubid = $objU -> obtenerRubroId($rubro);

		$sentenciaSql = "select * from DemandasPorRubro";

	}

	public function paginarDemandas($sql, $pagina) {

		$tamanoPagina = 10;

		if (!$pagina or $pagina = 0) {

			$inicio = 0;
			$pagina = 1;

		} else {

			$inicio = ($pagina - 1) * $tamanoPagina;

		}

		$resultado = $conexion -> ejecutarSentencia($sql);
		$numeroResultados = $conexion -> getNumFilas();

		$datos = mysql_fetch_array($resultado);

		$totalPaginas = ceil($numeroResultados / $tamanoPagina);

		$arrayRetorno = array('datos' => &$datos, 'totalPag' => $totalPaginas, 'pagina' => $pagina);

		return $arrayRetorno;

	}

}
?>