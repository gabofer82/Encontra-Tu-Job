<?php

/**
 *  Clase encargada de representar los Usuarios Empresas
 */
class Empresa extends Usuario {

	private $rut;
	private $direccion;
	private $rubro;
	private $sitoweb;
	private $referente;

	function __construct($nom, $mail, $pass, $telefono, $localidad, $codigoPostal, $xrut, $dir, $rub, $web, $ref) {

		parent:
		__construct($nom, $mail, $pass, $telefono, $localidad, $codigoPostal);

		$this -> rut = $xrut;
		$this -> direccion = $dir;
		$this -> rubro = $rub;
		$this -> sitoweb = $web;
		$this -> referente = $ref;

	}

	function getRut() {
		return $this -> rut;
	}

	function getDir() {
		return $this -> direccion;
	}

	function getRubro() {
		return $this -> rubro;
	}

	function getWeb() {
		return $this -> sitoweb;
	}

	function getReferente() {
		return $this -> referente;
	}

	function setRut($rut) {

		$this -> rut;

	}

	function setDireccion($direccion) {

		$this -> direccion;

	}

	function setRubro($rub) {

		$this -> rubro;

	}

	function setSitioWeb($web) {

		$this -> sitoweb;

	}

	function setReferente($ref) {

		return $this -> referente;

	}

}
?>