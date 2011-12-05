<?php

class DataBase {

	private $conexion;
	private $numFilas = 0;

	private static $instance;
	
	private function __construct($host,$usr,$pass) {
		//Hay que acomodar los datos de conexion
		$this -> conexion = mysql_connect($host, $usr, $pass)  or die(mysql_error());
		mysql_select_db('etj_db', $this -> conexion)  or die(mysql_error());
		$this -> queryTxt = "";
	$this -> numFilas = 0;

	}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new DataBase('127.0.0.1', 'root', '');
		}
		return self::$instance;
	}

	function desconectar() {

		mysql_free_result($resultado);
		$numFilas = 0;
		mysql_close();

	}


	public function ejecutarSentencia($sentencia) {


		$queryTxt = $sentencia;

		if ($queryTxt != "") {
			$resource = mysql_query($queryTxt) /*or die(msql_error())*/;

			if (mysql_num_rows($resource)) {
			$this -> numFilas = mysql_num_rows($resource);
			}
			return $resource;		
		}
	}


	function getResultado() {

		return $this -> resultado;

	}

	function getNumFilas() {

		return $this -> numFilas;

	}

}
?>