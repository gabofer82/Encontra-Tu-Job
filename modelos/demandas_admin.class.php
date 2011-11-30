<?php

/**
 * 
 */
class ClassName {
	
	function __construct($argument) {
		
	}
	
	public function ObtenerListarPorRubro($criterio,$valor) {
		
		if ($criterio) {
			
			if ($criterio = "Rubro") {
				
			}
	
		}
		
		
	}
	
	
	public function paginar($pagina) {
		
		$tamanoPagina = 10;
		
		if (!$pagina) {
			
			$inicio = 0;
			$pagina = 1;
			
		} else {
			
			$inicio = ($pagina - 1) * $tamanoPagina;
			
		}
		
		$numeroResultados = $conexion->getNumFilas();
		
		$totalPaginas = ceil($numeroResultados / $tamanoPagina);		
		
	}
	
}


?>