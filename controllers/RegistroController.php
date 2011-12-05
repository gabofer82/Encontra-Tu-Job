<?php
require 'WidgetController.php';

class RegistroController extends ControllerBase
{
	private $widgets = null;
	
    public function __construct()
    {
    	parent::__construct();	
    	$this->widgets = new WidgetController();
    }
	
	public function seleccionar()
	{
		//Por el momento no se necesita ningun control	
		$this->widgets->add_html_header();
        $this->widgets->add_user_bar();
        $this->widgets->add_content();		
        $this->view->show("seleccionar-registro.php");
		$this->widgets->add_footer();
	}
}
?>