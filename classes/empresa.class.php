<?php

/**
 *  Clase encargada de representar los Usuarios Empresas
 */

 include_once 'usuario.class.php';
  
class Empresa extends Usuario {

	private $nom;
	private $razonsocial;
	private $rut;
	private $logo;
	private $dir;
	private $sitioweb;
	private $tel;

	public function __construct($id, $nick, $pass, $nom, $ciu,$pais) {

		parent::__construct($id, $nick, $pass, $ciu,$pais);

		$this -> nom = $nom;

	}

	//Declaración de Getters y Setters

	public function getNom() {
		return $this -> nom;
	}

	public function getRazonSocial() {
		return $this -> razonsocial;
	}

	public function getRUT() {
		return $this -> rut;
	}

	public function getLogo() {
		return $this -> logo;
	}

	public function getDir() {
		return $this -> dir;
	}

	public function getSitioWeb() {
		return $this -> sitioweb;
	}

	public function getTel() {
		return $this -> tel;
	}

	public function setNom($nom) {$this -> nom = $nom;
	}

	public function setRazonSocial($razon) {$this -> razonsocial = $razon;
	}

	public function setRUT($rut) {$this -> rut = $rut;
	}

	public function setLogo($logo) {$this -> logo = $logo;
	}

	public function setDir($dir) {$this -> dir = $dir;
	}

	public function setSitoWeb($sito) {$this -> sitioweb = $sito;
	}

	public function setTel($tel) {$this -> tel = $tel;
	}

	//------------------------------------------------

}
?>