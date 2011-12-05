<?php
require 'WidgetController.php';

/**
 * Contiene todas las acciones relacionadas
 * con la entidad Empresa.
 */
class EmpresaController {
  
  function __construct() {
    
  }
  
  public function alta_empresa($datos){
  	/*
	 * $datos es el array $_POST
	 */
	//Incluye el modelo que corresponde
		require 'models/EmpresaModel.php';
		
		//Creamos una instancia de nuestro "modelo"
		$modelo = new EmpresaModel();
	
		//Le pedimos al modelo que guarde los datos
		$modelo->alta($datos);
		
		//Obtengo los datos de la nueva empresa
		$info->obtenerDatos($modelo['emp_id']);

		//Pasamos a la vista toda la informacion que se desea representar
		//El indice debe llamarse igual que la variable que se va a usar
		//en el template
		$data['info'] = $info;
		session_destroy();
		session_start();//agregar los datos de la nueva empresa
		//Finalmente presentamos nuestra plantilla
		$this->view->show("perfil-empresa.php", $data);
  }
}

?>