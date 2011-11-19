<?php
/**
 * Representa los usuarios del sitio
 */
class Usuario {

	private $id;
	private $nick;
	private $pass;
	private $ciudad;

	public function __construct($nick, $pass, $ciu) {

		$this -> id = calcularID();
		$this -> nick = $nick;
		$this -> pass = $pass;
		$this -> ciu = $ciu;

	}

	/**
	 * Funcion encargada de calcular en ID de cada usuario. Obtiene el id maximo de la tabla y lo devuelve.
	 */
	private function calcularID() {

		$conexion = $GLOBALS['conexion'];

		$sql = <<<SQL
select MAX(usr_id) from etj_usuarios		
SQL;

		return $conexion -> ejecutarSentencia($sql);

	}

	//Declaración de Getters y Setters

	public function getID() {
		return $this -> id;
	}

	public function getNick() {
		return $this -> nick;
	}

	public function getPass() {
		return $this -> pass;
	}

	public function getCiudad() {
		return $this -> ciudad;
	}

	public function setID($id) {
		$this -> id = $id;
	}

	public function setNick($nick) {
		$this -> nick = $nick;
	}

	public function setPass($pass) {
		$this -> pass = $pass;
	}

	public function setCiudad($ciu) {
		$this -> ciu = $ciu;
	}

	//-----------------------------------------------------------

}
?>