<?php

/**
 * Representa los curriuculums de los candidatos
 */
class Curriculum {

	private $documento;
	private $edocivil;
	private $direccion;
	private $cp;
	private $tel;
	private $e_mail;
	private $foto;
	private $academico;
	private $laboral;
	private $idiomas;
	//deberia ser un array ej: Idioma1 -> Medio, Idioma2 ->Alto
	private $puestodeseado;
	private $subscribir;

	public function __construct($documento, $email, $academico, $laboral, $idiomas, $subscribir) {

		$this -> documento = $documento;
		$this -> e_mail = $email;
		$this -> academico = $academico;
		$this -> laboral = $laboral;
		$this -> idiomas = $idiomas;
		$this -> subscribir = $subscribir;
	}
	
//Declaración de Getters y Setter

	public function getDocumento() {
		return $this -> documento;
	}

	public function getECivil() {
		return $this -> edocivil;
	}

	public function getDireccion() {
		return $this -> direccion;
	}

	public function getCodigoPostal() {
		return $this -> cp;
	}

	public function getTelefono() {
		return $this -> tel;
	}

	public function getMail() {
		return $this -> e_mail;
	}

	public function getFoto() {
		return $this -> foto;
	}

	public function getEAcademicas() {
		return $this -> academico;
	}

	public function getExLaboral() {
		return $this -> laboral;
	}

	public function getIdiomas() {
		return $this -> idiomas;
	}

	public function getPuestoDeseado() {
		return $this -> puestodeseado;
	}

	public function getSubscribir() {
		return $this -> subscribir;
	}

	public function setDocumento($doc) {$this -> documento = $doc;
	}

	public function setECivil($edocivil) {$this -> edocivil = $edocivil;
	}

	public function setDireccion($direccion) {$this -> direccion = $direccion;
	}

	public function setCodigoPostal($cp) {$this -> cp = $cp;
	}

	public function setTelefono($tel) {$this -> tel = $tel;
	}

	public function setMail($mail) {$this -> e_mail = $mail;
	}

	public function setFoto($foto) {$this -> foto = $foto;
	}

	public function setEAcademicos($acad) {$this -> academico = $acad;
	}

	public function setExLaboral($lab) {$this -> laboral = $lab;
	}

	public function setIdiomas($idiomas) {$this -> idiomas = $idiomas;
	}

	public function setPuestoDeseado($pdeseado) {$this -> puestodeseado = $pdeseado;
	}

	public function setSubscribir($subscribir) {$this -> subscribir = $subscribir;
	}

	//-----------------------------------------------------

}
?>