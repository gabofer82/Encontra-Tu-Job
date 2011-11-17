<?php
/**
 * Representa los usuarios del sitio
 */
class Usuario {
	
	private $id;
	private $nom;
	private $dir;
	private $usrmail;
	private $pass;
	private $ciudad;
	
	private $conexion;

	function __construct($nom,$dir,$mail,$pass,$ciudad) {
	
		if ($nom='Visitante') {
			
				//Para iniciar sesion como visitante
		$this->nom = $nom;
		$this->id = 0;
		$this->dir='';
		$this->pass='';
		$this->usrmail='';
		$this->ciudad='';
					
		} else {
		
		//Constructor para usuarios registrados
		$this->nom = $nom;
		$this->id = calcularId();
		$this->dir=$dir;
		$this->pass= $pass;
		$this->usrmail=$mail;
		$this->ciudad=$ciudad;
							
		}
	}
	
	private function calcularID() {
		
		$conexion = $GLOBALS['conexion'];
		
		$sql = <<<SQL
select MAX(usr_id) from etj_usuarios		
SQL;
		
		return $conexion->ejecutarSentencia($sql);
				
	}	
	
	function getNom() {
		return $this->nom;
	}
	
	function getMail() {
		return $this->usrmail;
	}
	
	function getPass() {
		return $this->pass;
	}
	
	function getDir() {
		return $this->dir;
	}
	
	function getCiudad() {
		return $this->ciudad;
	}
	
	function getID() {
		return $this->id;
	}
	
	function setMail($mail) {
		
		$this->usrmail=$mail;	
		
	}
	
	function setPass($pass) {
		
		$this->pass=$pass;	
		
	}	
	
	function setCiudad($ciudad) {
		
		$this->ciudad=$ciudad;	
		
	}
	
	function setDir($dir) {
		
		$this->dir=$dir;	
		
	}

			
}
?>