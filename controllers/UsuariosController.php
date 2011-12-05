<?php
require 'WidgetController.php';

$config = Config::singleton();
$ruta = $config -> get('modelsFolder');

require $ruta . "/usuario_admin.class.php";

class UsuariosController extends ControllerBase {

	private $widgets = null;

	public function __construct() {
		parent::__construct();
		$this -> widgets = new WidgetController();
	}

	//Accion index
	public function registro_usr() {
		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('usuarios_alta.php');
		$this -> widgets -> add_footer();

		/*$paths[0] = $this->widgets->add_html_header();
		 $data[0] = $this->widgets->add_user_bar();
		 $paths[1] = '';
		 $paths[1] = $this->widgets->add_content();
		 $paths[2] = 'index.php';
		 $paths[3] = $this->widgets->add_footer();
		 $this->view->show_all_templates($paths, $data);*/
	}

	public function login_usr() {

		$objU = UsuarioAdmin::getInstance();
		$pass = md5($_POST['password']);

		if ($objU -> login_usuario($_POST['user-name'], $pass)) {
			session_start();
			$_SESSION['iniciada'] = true;
			$_SESSION['name_user'] = $_SESSION['user']->getNick();
			$datos['user'] = $_POST['user-name'];
			
		} else {
			echo "<script>	alert('Usuario no existe o Contrase�a incorrecta.');</script>";
		}
		
		$this -> widgets -> add_html_header();
		$this -> widgets -> add_user_bar();
		$this -> widgets -> add_content();
		$this -> view -> show('inicio.php',$datos);
		$this -> widgets -> add_footer();
		
	}
	
	public function logout_usr() {
		
		session_start();
		session_destroy();
		
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