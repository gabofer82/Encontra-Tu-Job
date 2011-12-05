<?php
require 'WidgetController.php';

$config = Config::singleton();
$ruta = $config -> get('modelsFolder');
require_once $ruta . "/demandas_admin.class.php";

class DemandasController extends ControllerBase
{
		
	private $widgets = null;
	
    public function __construct()
    {
    	parent::__construct();	
    	$this->widgets = new WidgetController();
    }
    
    //Accion index
    public function ver_demandas()
    {
    	
		$objD = new DemandaAdmin;	
			
		$datos['demandas'] = $objD->ObtenerUltimasDemandas();	
		
        $this->widgets->add_html_header();
	    $this->widgets->add_user_bar();
	    $this->widgets->add_content();		
        $this->view->show('ver-demanda.php',$datos);
		$this->widgets->add_footer();
		
		/*$paths[0] = $this->widgets->add_html_header();
        $data[0] = $this->widgets->add_user_bar();
		$paths[1] = '';
        $paths[1] = $this->widgets->add_content();	
		$paths[2] = 'index.php';	
		$paths[3] = $this->widgets->add_footer();
		$this->view->show_all_templates($paths, $data);*/
    }
	
	public function mostrar_demanda() {
		
		$objD = new DemandaAdmin;	
			
		$datos['demanda'] = $objD->ObtenerDemanda($_GET['dem']);	
		
		 $this->widgets->add_html_header();
	    $this->widgets->add_user_bar();
	    $this->widgets->add_content();		
        $this->view->show('mostrar-demanda.php',$datos);
		$this->widgets->add_footer();
		
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