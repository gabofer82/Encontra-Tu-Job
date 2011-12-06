<?php
require 'WidgetController.php';

$config = Config::singleton();
$ruta = $config -> get('modelsFolder');
require_once $ruta . "/demandas_admin.class.php";
require_once $ruta . "/Empresa_admin.class.php";

class DemandasController extends ControllerBase {

	private $widgets = null;

	public function __construct() {
		parent::__construct();
		$this -> widgets = new WidgetController();
	}

	public function alta_demanda() {

		$objD = new DemandaAdmin;

		$fechaP = $_POST['anhoPubli'] . "" . $_POST['mesPubli'] . "" . $_POST['diaPubli'];
		$fechaC = $_POST['anhoCierre'] . "" . $_POST['mesCierre'] . "" . $_POST['diaCierre'];

		$retorno = $objD -> altaDemanda($_POST['txtTitulo'], $_POST['txtRef'], $_POST['txtDesc'], $_POST['txtPerfil'], $_POST['txtCargo'], $_POST['txtHorario'], $_POST['txtVacantes'], $_POST['txtNivEstudios'], $_POST['slcIdioma'], $_POST['txtConocimientos'], $fechaP, $fechaC);

		if ($retorno) {
			echo "<script>alert(\"Demanda Creada Existosamente\")</script>";
		} else {
			echo "<script>alert(\"Registro Fallido\")</script>";
		}

	}

	//Accion index
	public function ver_demandas() {

		$objD = new DemandaAdmin;

		$datos['demandas'] = $objD -> ObtenerUltimasDemandas();

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('ver-demanda.php', $datos);
		$this -> widgets -> add_footer();

		/*$paths[0] = $this->widgets->add_html_header();
		 $data[0] = $this->widgets->add_user_bar();
		 $paths[1] = '';
		 $paths[1] = $this->widgets->add_content();
		 $paths[2] = 'index.php';
		 $paths[3] = $this->widgets->add_footer();
		 $this->view->show_all_templates($paths, $data);*/
	}

	public function demanda_reg() {

		$objD = new DemandaAdmin;
		$objU = EmpresaAdmin::getInstance();

		$datos['idio'] = $objU -> obtenerIdiomas();

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('alta-demanda.php', $datos);
		$this -> widgets -> add_footer();

	}

	public function mostrar_demanda() {

		$objD = new DemandaAdmin;

		$datos['demanda'] = $objD -> ObtenerDemanda($_GET['dem']);

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('mostrar-demanda.php', $datos);
		$this -> widgets -> add_footer();

	}

	public function alta_postulante() {

		$objD = new DemandaAdmin;

		$datos['demanda'] = $objD -> PostularseDemanda($_REQUEST['demid']);

		if ($datos['demanda']) {

			echo "<script>alert(\"Postulación aceptada\")</script>";

		}

		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('inicio.php', $datos);
		$this -> widgets -> add_footer();

	}

	public function hola() {

		return "hola";

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