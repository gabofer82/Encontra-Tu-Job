<?php
/**
 * Representa los usuarios del sitio
 */
class Usuario {
	
	private $nombre;
	private $usrmail;
	private $pass;
	private $telefono;
	private $localidad;
	private $codigoPostal;
	
	
	function __construct($nom = 'Visitante') {
		//Para iniciar sesion como visitante
		$this->nombre=$nom;
		$this->usrmail="";
		$this->pass="";
		$this->telefono="";
		$this->localidadl="";
		$this->codigoPostal="";
		
	}
	
	function __construct($nom,$mail,$pass,$telefono,$localidad,$codigoPostal) {
		//Constructor para usuarios registrados
		$this->nombre=$nom;
		$this->usrmail=$mail;
		$this->pass=$pass;
		$this->telefono=$telefono;
		$this->localidadl=$localidad;
		$this->codigoPostal=$codigoPostal;
	}	
	
	function toString() {
		
		return "Usuario: ". $this->nombre." EMail: ".$this->usrmail;
		
	}
	
	function getNom() {
		return $this->nombre;
	}
	
	function getMail() {
		return $this->usrmail;
	}
	
	function getPass() {
		return $this->pass;
	}
	
	function getTel() {
		return $this->telefonot;
	}
	
	function getLoc() {
		return $this->localidadl;
	}
	
	function getCP() {
		return $this->codigoPostalc;
	}
	
	function setNom($nom) {
		
		$this->nombre=$nom;	
		
	}
	
	function setMail($mail) {
		
		$this->usrmail=$mail;	
		
	}
	
	function setPass($pass) {
		
		$this->pass=$pass;	
		
	}	
	
	function setTel($tel) {
		
		$this->telefonot=$tel;	
		
	}
	
	function setLoc($loc) {
		
		$this->localidad=$loc;	
		
	}
	
	function setCP($CP) {
		
		$this->codigoPostal=$CP;	
		
	}
			
}
?>