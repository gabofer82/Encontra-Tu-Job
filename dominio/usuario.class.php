<?php
/**
 * Representa los usuarios del sitio
 */
class Usuario {
	
	private $nombre;
	private $pass;
	private $usrmail;
	
	function __construct($nom,$pass,$mail) {
		$this->nombre=$nom;
		$this->usrmail=$mail;
		$this->pass=$pass;
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
	
	function setNom($nom) {
		
		$this->nombre=$nom;	
		
	}
	
	function setMail($mail) {
		
		$this->usrmail=$mail;	
		
	}
	
	function setNom($pass) {
		
		$this->pass=$pass;	
		
	}
			
}
?>