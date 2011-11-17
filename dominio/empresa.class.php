<?php

/**
 *  Clase encargada de representar los Usuarios Empresas
 */
class Empresa extends Usuario {

	private $rut;
	private $descripcion;
	private $rubroid;
	private $logo;
	
	function __construct($nom,$dir,$mail,$pass,$ciudad,$rut,$rubro) {

		parent:__construct($nom,$dir,$mail,$pass,$ciudad);

		$this -> rut = $xrut;
		$this -> rubroid = $rubro;
	}

	function getRut() {
		return $this -> rut;
	}

	function getDesc() {
		return $this -> descripcion;
	}

	function getRubro() {
		return $this -> rubroid;
	}

	function getLogo() {
		return $this -> logol;
	}

	function setRut($rut) {
		$this -> rut = $rut;
	}

	function setDescripcion($desc) {
		$this ->descripcion= $desc;
	}

	function setRubro($rub) {
		$this -> rubroid = $rub;
	}

	function setLogo($logo) {
		$this -> logo = $logo;
	}

}
?>