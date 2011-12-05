<?php
require 'WidgetController.php';

/**
 * Contiene todas las acciones relacionadas
 * con la entidad Empresa.
 */
class EmpresaController extends ControllerBase
{
  
  	private $widgets = null;
	
    public function __construct()
    {
    	parent::__construct();	
    	$this->widgets = new WidgetController();
    }
  
  public function alta_form(){
  		//Incluye el modelo que corresponde
		require 'models/EmpresaModel.php';
		
		//Creamos una instancia de nuestro "modelo"
		$empresa = new EmpresaModel();
	
		//Le pedimos al modelo todos los items
		$listado = $empresa->listarCiudades();

		//Pasamos a la vista toda la informaci�n que se desea representar
		$data['listadoCiudades'] = $listado;
		
  		$this->widgets->add_html_header();
        $this->widgets->add_user_bar();
        $this->widgets->add_content();		
        $this->view->show('alta-empresa.php', $data);
		$this->widgets->add_footer();
  }
  
  public function alta_empresa(){
  	/*
	 * $datos es el array $_POST
	 */
	//Incluye el modelo que corresponde
		require 'models/EmpresaModel.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modelo = new EmpresaModel();
	
		//Le pedimos al modelo que guarde los datos
		$idEmp = $modelo->alta($_POST);
		
		//Obtengo los datos de la nueva empresa
		$info = $modelo->obtenerDatos($idEmp);

		//Pasamos a la vista toda la informacion que se desea representar
		//El indice debe llamarse igual que la variable que se va a usar
		//en el template
		$data['info'] = $info;
		//session_destroy();
		session_start();//agregar los datos de la nueva empresa
		//Finalmente presentamos nuestra plantilla
		$this->view->show("perfil-empresa.php", $data);
  }
}

?>