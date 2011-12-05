<?php
class FrontController
{
	static function main()
	{
		//Incluimos algunas clases:
		
		require 'libs/Config.php'; //de configuracion
		require 'libs/SPDO.php'; //PDO con singleton
		require 'libs/ControllerBase.php'; //Clase controlador base
		require 'libs/ModelBase.php'; //Clase modelo base
		require 'libs/View.php'; //Mini motor de plantillas
		
		require 'config.php'; //Archivo con configuraciones.
		
		//Con el objetivo de no repetir nombre de clases, nuestros controladores
		//terminaran todos en Controller. Por ej, la clase controladora Items, será ItemsController
		
		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
		if(! empty($_GET['controlador']))
		      $controllerName = $_GET['controlador'] . 'Controller';
		else
		      $controllerName = "IndexController";
		
		//Lo mismo sucede con las acciones, si no hay accion, tomamos index como accion
		if(! empty($_GET['accion']))
		      $actionName = $_GET['accion'];
		else
		      $actionName = "index";
		
		$controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
			
		//Incluimos el fichero que contiene nuestra clase controladora solicitada	
		if(is_file($controllerPath))
		      require $controllerPath;
		else
		      die('El controlador no existe - 404 not found');
		
		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		if (is_callable(array($controllerName, $actionName)) == false) 
		{
			trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
			return false;
		}
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion
		$controller = new $controllerName();
		$controller->$actionName();
	}
}
?>