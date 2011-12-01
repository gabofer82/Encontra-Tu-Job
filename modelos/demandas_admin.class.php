<?php

/**
 *
 */
class ClassName {

	function __construct($argument) {

	}

	public function GenerarConsulta($criterio, $valor) {

		if ($criterio = "Rubro") {

			$sql = <<<SQL
select * from etj_demandas where emp_id = 
(select * from etj_empresas natural join etj_rubros where rub_nom = $valor)
SQL;

		}

		if ($criterio = "Empresa") {

			$sql = <<<SQL
select * from etj_demandas where emp_id = $valor
SQL;

		}

		if ($criterio = "Ciudad") {

			$sql = <<<SQL
select * from etj_demandas where emp_id = 
(select * from etj_empresas natural join etj_ciudades where ciu_nom = $valor)
limit 
SQL;

		}
		
		

	}

	public function paginar($sql, $pagina) {

		$tamanoPagina = 10;

		if (!$pagina or $pagina = 0) {

			$inicio = 0;
			$pagina = 1;

		} else {

			$inicio = ($pagina - 1) * $tamanoPagina;

		}

		$resultado = $conexion->ejecutarSentencia($sql);
		$numeroResultados = $conexion -> getNumFilas();
		
		$datos = mysql_fetch_array($resultado);
		
		$totalPaginas = ceil($numeroResultados / $tamanoPagina);

		$arrayRetorno = array('datos'=> &$datos,'totalPag'=>$totalPaginas,'pagina'=>$pagina);
	
		return $arrayRetorno;

	}

}
?>