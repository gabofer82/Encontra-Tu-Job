<?php

/**
 *  Clase encargada de representar los Usuarios Postulantes
 */

 include_once 'usuario.class.php';
 
class Candidato extends Usuario {

	private $nom;
	private $ape;
	private $sexo;
	private $fNac;

	public function __construct($id,$nick,$pass,$ciu,$pais,$nom, $ape, $sexo, $fNac) {

		parent::__construct( $nick, $pass, $ciu,$pais);

		$this -> nom = $nom;
		$this -> ape = $ape;
		$this -> sexo = $sexo;
		$this -> fNac = $fNac;
	}

//Declaración de getters y setters

	public function getNom() {
		return $this -> nom;
	}

	public function getApe() {
		return $this -> ape;
	}

	public function getSexo() {
		return $this -> sexo;
	}

	public function getFNac() {
		return $this -> fNac;
	}

	public function setNom($nom) {
		$this -> nom = $nom;
	}

	public function setApe($ape) {
		$this -> ape = $ape;
	}

	public function setSexo($sexo) {
		$this -> sexo = $ape;
	}

	public function setFNac($fNac) {
		$this -> fNac = $fNac;
	}

	
//-------------------------------------------------------	

}
?>