<?php
require_once 'WidgetController.php';

$config = Config::singleton();
$ruta = $config -> get('modelsFolder');
require_once $ruta . "/candidato_admin.class.php";


class CandidatosController extends ControllerBase {

	private $widgets = null;


	public function __construct() {
		parent::__construct();
		$this -> widgets = new WidgetController();

	}

	//Accion index
	public function registro_can() {

		$objU = CandidatoAdmin::getInstance();

		$datos['ciudades'] = $objU -> obtenerCiudades();

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('alta-candidato.php', $datos);
		$this -> widgets -> add_footer();

		/*$paths[0] = $this->widgets->add_html_header();
		 $data[0] = $this->widgets->add_user_bar();
		 $paths[1] = '';
		 $paths[1] = $this->widgets->add_content();
		 $paths[2] = 'index.php';
		 $paths[3] = $this->widgets->add_footer();
		 $this->view->show_all_templates($paths, $data);*/
	}

	public function alta_candidato() {
		
		$objU = CandidatoAdmin::getInstance();
		
		if ($objU -> validarContrasena($_POST['txtUsrPass'], $_POST['txtUsrRePass'])) {
			$pass = md5($_POST['txtUsrPass']);
			$fecha = $_POST['anhoNac'] . "/" . $_POST['mesNac'] . "/" . $_POST['diaNac'];
			$retorno = $objU -> altaCandidato($_POST['txtUsrNom'], $pass, $_POST['txtNombre'], 
			$_POST['txtApellido'], $_POST['radioSexo'], $_POST['slcciudad'], $_POST['slcpais'], $fecha);
			
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