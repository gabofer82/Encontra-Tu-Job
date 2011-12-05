<?php
class WidgetController extends ControllerBase {
	public function __construct()
	 {

	 }
	 
	public function add_html_header() {
		//return 'header.php';
		$this -> view -> show('header.php');
	}

	public function add_user_bar() {

		require_once 'classes/usuario.class.php';
		require_once 'classes/candidato.class.php';
		require_once 'classes/empresa.class.php';
	//	session_start();
	/*	if (!$_SESSION['iniciada']) {
			$visitante = TRUE;

			if (!isset($_SESSION['user'])) {
				$usrAnon = new Usuario(0, "", "", "", "");
				$_SESSION['user'] = $usrAnon;
			} else {
				$visitante = FALSE;
			}

			$data['visita'] = $visitante;
		}
	*/
/*$GLOBALS['visit'] = $visit_bar;
session_start();
if (!isset($_SESSION['user'])) {
$usrAnon = new Usuario(0, $visit_bar, "", "", "");	
$_SESSION['user'] = $usrAnon;
//Usuario no se podia convertir a string por eso era imposible mostrarlo
//para eso agregue un nuevo indice al $_SESSION
$_SESSION['name_user'] = $_SESSION['user']->getNick();
}*/
		$this -> view -> show('user-bar.php');
		//return $data;

}

	public function add_content() {
		$this -> view -> show('content.php');
		//return 'content.php';
	}

	public function add_footer() {
		$this -> view -> show('footer.php');
		//return 'footer.php';
	}

}
?>