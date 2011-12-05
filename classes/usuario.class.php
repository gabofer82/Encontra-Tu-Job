<?php
/**
 * Representa los usuarios del sitio
 */
class Usuario {

	private $id;
	private $nick;
	private $pass;
	private $ciudad;
	private $pais;

	public function __construct($id,$nick,$pass,$ciu,$pais) {

			$this -> id = $id;
			$this -> nick = $nick;
			$this -> pass = $pass;
			$this -> ciudad = $ciu;
			$this -> pais = $pais;
		

	}

	/**
	 * Funcion encargada de calcular en ID de cada usuario. Obtiene el id maximo de la tabla y lo devuelve.
	 */
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

	public function getPais() {
		return $this -> pais;
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
		$this -> ciudad = $ciu;
	}

	public function setPais($pais) {
		$this -> pais = $pais;
	}

	//-----------------------------------------------------------

}
?>