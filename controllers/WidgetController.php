<?php

class WidgetController extends ControllerBase
{
	/*public function __construct()
	{
		
	}	
	*/
	public function add_html_header()
	{
		//return 'header.php';
		$this->view->show('header.php');
	}
	
	public function add_user_bar()
    {
		require_once 'classes/usuario.class.php';
		require_once 'classes/candidato.class.php';
		require_once 'classes/empresa.class.php';			
		$visitante = TRUE;	
		if (!isset($_SESSION['user']))
		{
			session_start();
		
			$usrAnon = new Usuario(0, "", "", "", "");	
			$_SESSION['user'] = $usrAnon;
		}
		else 
		{
			$visitante = FALSE;  
		}
		
		$data['visita'] = $visitante;
			
		$this->view->show('user-bar.php', $data);
		//return $data;
    }
	
	public function add_content()
	{
		$this->view->show('content.php');
		//return 'content.php';
	}
	
	public function add_footer()
	{
		$this->view->show('footer.php');
		//return 'footer.php';
	}
}
?>