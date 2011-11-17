<?php

class DataBase {

	private $conexion;
	private $queryTxt;
	private $umFilas = 0;
	private $resultado;
	
	private static $objBD = null;
	
	    public static function getInstance()
    {
        if( !self::$objBD instanceof self )
        {
                self::$objBD = new self('127.0.0.1','root','');
        }
		return self::$objBD;
    }

	function __construct($host,$usr,$pass){
	//Hay que acomodar los datos de conexion
		$this->conexion = @mysql_connect($host, $usr, $usr);
		mysql_select_db('etj_bd');
		$this->queryTxt = "";
		$this->numFilas = 0;
		$GLOBALS['conexion'] = $this;		
		
	}
	
	function desconectar() {
		
		mysql_free_result($resultado);
		$numFilas = 0;
		mysql_close();
	
	}
	
	function ejecutar() {
	
		if ($this->queryTxt !="") {
		
			$this->resultado = mysql_query ( $this->queryTxt );
			$this->numFilas = mysql_num_rows( $this->resultado );
		
		}
	
	}
	
	function ejecutarSentencia($sentencia) {
		
		setQueryText ( $sentencia );
		ejecutar();
		
	}
	
	function setQueryText ( $sentencia ) {
	
		$this->queryTxt = "";
		$this->queryTxt = $sentencia;
	
	}
	
	function getResultado () {
	
		return $this->resultado;
	
	}
	
	function getNumFilas() {
	
		return $this->numFilas;
	
	}
	
}

?>