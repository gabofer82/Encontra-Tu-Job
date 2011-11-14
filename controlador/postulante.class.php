<?php
    /**
     * Este es el controlador para el postulante, se encarga de
	 * todas las cosas tipo alta, baja, modificacion, etc
	 * Implementa Singleton Pattern
     */
    class Postulante{
      private static $instance;
	  
      private function __construct($argument) {
      	//algo
      }
	  
	  public static function getInstance() {
	  	if (isset(self::$instance)) {
	  		$c = __CLASS__;
			self::$instance = new $c; 
	  	}
		return self::$instance;
	  }
	  
	  public function alta($value='') {
		
	  }
	  
	  public function baja($value='') {
		
	  }
	  
	  public function modificar($value='') {
	  	
	  }
    }
    
?>