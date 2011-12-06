<?php
require_once 'WidgetController.php';

$config = Config::singleton();
$ruta = $config -> get('modelsFolder');
require_once $ruta . "/empresa_admin.class.php";

class EmpresaController extends ControllerBase {

	private $widgets = null;

	public function __construct() {
		parent::__construct();
		$this -> widgets = new WidgetController();

	}

	//Accion index
	public function registro_emp() {

		$objU = EmpresaAdmin::getInstance();

		$datos['ciudades'] = $objU -> obtenerCiudades();
		$datos['rubros'] = $objU -> obtenerRubros();

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('alta-empresa.php', $datos);
		$this -> widgets -> add_footer();

		/*$paths[0] = $this->widgets->add_html_header();
		 $data[0] = $this->widgets->add_user_bar();
		 $paths[1] = '';
		 $paths[1] = $this->widgets->add_content();
		 $paths[2] = 'index.php';
		 $paths[3] = $this->widgets->add_footer();
		 $this->view->show_all_templates($paths, $data);*/
	}

	public function alta_empresa() {

		$objU = EmpresaAdmin::getInstance();

		if ($objU -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
			$pass = md5($_POST['txtUsrPass']);

			$retorno = $objU -> altaEmpresa($_POST['txtUsrNom'], $pass, $_POST['txtNombre'], $_POST['slcciudad'], $_POST['slcpais'], $_POST['slcrubro']);

			if ($retorno) {
				echo "<script>alert(\"Usuario Registrado Existosamente\")</script>";
			} else {
				echo "<script>alert(\"Registro Fallido\")</script>";
			}

		} else {
			echo "<script>alert(\"Registro Fallido\")</script>";
		}

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('inicio.php');
		$this -> widgets -> add_footer();

	}

	public function mod_Empresa() {

		$objU = EmpresaAdmin::getInstance();

		session_start();
		$passVieja = md5($_POST['txtUsrActPass']);
		if ($_SESSION['user'] -> getPass() == $passVieja) {
			if ($objU -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {

				$pass = md5($_POST['txtUsrPass']);
				$retorno = $objU -> modEmpresa($_POST['txtNombre'],$_POST['txtRazon'],$_POST['txtRUT'],
				$_POST['txtDir'],$_POST['txtWeb'],$_POST['txtTel'],$_POST['slcciudad'],
				$_POST['slcpais'],$_POST['fileFoto']);

				if ($retorno) {

					$this -> widgets -> add_html_header();
					$this -> widgets -> add_user_bar();
					$this -> widgets -> add_content();
					$this -> view -> show('modificar-candidato.php', $datos);
					$this -> widgets -> add_footer();

				}
			}
		}
	}

	public function ver_perfil() {

		$objU = EmpresaAdmin::getInstance();

		$datos['ciudades'] = $objU -> obtenerCiudades();

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('perfil-empresa.php', $datos);
		$this -> widgets -> add_footer();

	}

	public function view_alta_curriculum() {

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('alta-curriculum.php');
		$this -> widgets -> add_footer();

	}

	public function ver_curriculum() {
		$objU = CandidatoAdmin::getInstance();
		if (!$objU -> tieneCurriculum()) {
			$datos['curriculum'] = $objU -> tieneCurriculum();
			$this -> widgets -> add_html_header();
			$this -> widgets -> add_user_bar();
			$this -> widgets -> add_content();
			echo "<script>alta(\"No se ha encontrado Curriculum. Redirigiendo a formulario de alta.\");</script>";
			$this -> view -> show('alta-curriculum.php', $datos);
			$this -> widgets -> add_footer();

		} else {

			$datos['curriculum'] = $objU -> tieneCurriculum();

			session_start();
			$curr = $_SESSION['curr'];
			$usr = $_SESSION['user'];

			$datos['ciudad'] = $objU -> obtenerNombreCiudad($usr -> getCiudad(), $usr -> getPais());

			$datos['idioma'] = $objU -> obtenerNombreIdioma($idioma);
			$datos['usuario'] = $usr;
			$datos['curriculum'] = $curr;

			$this -> widgets -> add_html_header();
			$this -> widgets -> add_user_bar();
			$this -> widgets -> add_content();
			$this -> view -> show('ver-curriculum.php', $datos);
			$this -> widgets -> add_footer();
		}
	}

	public function alta_curriculum() {

		$retorno = $CanAdmin -> altaCurriculum($_POST['txtDocNum'], $_POST['txtDocTipo'], $_POST['txtMail'], $_POST['txtEdoCivil'], $_POST['txtDir'], $_POST['txtCP'], $_POST['txtTel'], $_POST['fileFoto'], $_POST['txtPuesto'], $_POST['txtEstudios'], $_POST['txtLaborales'], $_POST['slcIdioma'], $_POST['slcNivel'], $_POST['chkSubs']);

		if ($retorno) {

			$this -> widgets -> add_html_header();
			$this -> widgets -> add_user_bar();
			$this -> widgets -> add_content();
			$this -> view -> show('ver-curriculum.php', $datos);
			$this -> widgets -> add_footer();

		}

	}

	public function mod_curriculum() {

		$retorno = $CanAdmin -> modCurriculum($_POST['txtDocNum'], $_POST['txtDocTipo'], $_POST['txtMail'], $_POST['txtEdoCivil'], $_POST['txtDir'], $_POST['txtCP'], $_POST['txtTel'], $_POST['fileFoto'], $_POST['txtPuesto'], $_POST['txtEstudios'], $_POST['txtLaborales'], $_POST['slcIdioma'], $_POST['slcNivel'], $_POST['chkSubs']);

		if ($retorno) {

			$this -> widgets -> add_html_header();
			$this -> widgets -> add_user_bar();
			$this -> widgets -> add_content();
			$this -> view -> show('ver-curriculum.php', $datos);
			$this -> widgets -> add_footer();

		}

	}

	public function testView() {
		$vars['nombre'] = "Federico";
		$vars['lugar'] = $this -> getLugar();
		$this -> view -> show("test.php", $vars);
	}

	private function getLugar() {
		return "Buenos Aires, Argentina";
	}

}
?>