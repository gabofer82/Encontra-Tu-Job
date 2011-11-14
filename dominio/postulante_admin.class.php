<?php
    /**
     * Este es el controlador para el postulante, se encarga de
	 * todas las cosas tipo alta, baja, modificacion, etc
	 * Implementa Singleton Pattern
     */
    class PostulanteAdmin{
    	
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
	  
	  public function alta($objP) {
		
		$arrP = obtener();
		
		foreach ($arrP as $key => $value) {
		
			if ($objP->getNom() != $key->getNom()) {
				
				$sentenciaSql = <<<SQL
insert into postulante('nom','pass','mail','sexo','fNac','localidad')
values($objP->getNom(),$objP->getPass(),
$objP->getMail(),$objP->getSexo(),
$objP->getFNac(),$objP->getLoc())
SQL;

				mysql_query($sentenciaSql);
				break;
			}
		} 
	  }
	  
	  public function baja($objP) {
		
				$arrP = obtener();
		
		foreach ($arrP as $key => $value) {
		
			if ($objP->getNom() == $key->getNom()) {
				
				$sentenciaSql = <<<SQL
delete from postulantes
where nom=$objP->getNom() 
SQL;

				mysql_query($sentenciaSql);
				break;
				
			}
		}
		
	  }
	  
	  public function modificar($value='') {
	  	
	  }
	  
	  public function obtener() {
	  	

		
			$sentenciaSql = <<<SQL
select * from Postulantes
SQL;

			$resQuery = mysql_query($sentenciaSql);
			
			if ($resQuery) {
				
				$arrPost;
				$cont = 0;
				
				while($dato = mysql_fetch_assoc($resQuery)) {
					
					$objP = $dato['nom'].",".$dato['pass'].",".$dato['mail'].",".
					$dato['sexo'].",".$dato['fNac'].",".$dato['localidad'];
					
					$arrPost[$cont] = $objP;
					$cont ++;
					
				}
				
				return $arrPost or die("No existen elementos");
				
			}
			
	  }
	  
	  	  
    }
    
?>