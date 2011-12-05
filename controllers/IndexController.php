<?php
require 'WidgetController.php';

class IndexController extends ControllerBase
{
		
	private $widgets = null;
	
    public function __construct()
    {
    	parent::__construct();	
    	$this->widgets = new WidgetController();
    }
    
    //Accion index
    public function index()
    {
        $this->widgets->add_html_header();
        $this->widgets->add_user_bar();
        $this->widgets->add_content();		
        $this->view->show('inicio.php');
		$this->widgets->add_footer();
		
		/*$paths[0] = $this->widgets->add_html_header();
        $data[0] = $this->widgets->add_user_bar();
		$paths[1] = '';
        $paths[1] = $this->widgets->add_content();	
		$paths[2] = 'index.php';	
		$paths[3] = $this->widgets->add_footer();
		$this->view->show_all_templates($paths, $data);*/
    }
    
	public function hola() {
		
		return "hola";
		
	}
	
    public function testView()
    {
        $vars['nombre'] = "Federico";
        $vars['lugar'] = $this->getLugar();
        $this->view->show("test.php", $vars);
    }
    
    private function getLugar()
    {
        return "Buenos Aires, Argentina";
    }
}
?>