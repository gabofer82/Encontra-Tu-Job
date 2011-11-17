<?php

/**
 *  Clase encargada de representar los Usuarios Postulantes
 */
class Postulante extends Usuario {

	private $apellido;
	private $fNac;
	private $sexo;
	private $tipoDoc;
	private $nroDoc;
	private $curriculum;
	private $avatar;

	function __construct($nom, $dir, $mail, $pass, $ciudad, $ape, $fNac, $sexo, $tipoDoc, $nroDoc) {

		parent:
		__construct($nom, $dir, $mail, $pass, $ciudad);

		$this -> apellido = $ape;
		$this -> fNac = $fNac;
		$this -> sexo = $sexo;
		$this -> tipoDoc = $tipoDoc;
		$this -> nroDoc = $nroDoc;

	}

	function getApe() {
		return $this -> apellido;
	}

	function getFNac() {
		return $this -> fNac;
	}

	function getSexo() {
		return $this -> sexo;
	}

	function getCurr() {
		return $this -> curriculum;
	}

	function getAvatar() {
		return $this -> avatar;
	}

	function getDocumento() {
		$documento = $this -> tipoDoc . ": " . $this -> nroDoc;
		return $documento;
	}

	function setApe($ape) {
		$this -> apellido = $ape;
	}

	function setSexo($sex) {
		$this -> sexo = $sex;
	}

	function setFNac($fnac) {

		$this -> fNac = $fnac;
	}
	
	function setTipoDoc($tipodoc) {
		$this -> tipoDoc = $tipodoc;
	}
	
	function setNroDoc($nrodoc) {
		$this -> nroDoc = $nrodoc;
	}

	function setCurriculum($curr) {

		$this -> curriculum = $fcurr;
	}

	function setAvatar($avt) {

		$this -> avatar = $avt;
	}

}
?>