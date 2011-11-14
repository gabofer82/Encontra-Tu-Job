<?php

	/**
	 *  Clase encargada de representar los Usuarios Postulantes
	 */
	class Postulante extends Usuario  {
		
		private $sexo;
		private $fNac;
		private $localidad;
		
		function __construct($nom,$pass,$mail,$sexo,$fNac,$localidad) {
			
			parent:__construct($nom,$pass,$mail);
			
			$this->sexo=$sexo;
			$this->localidad=$localidad;
			$this->fNac=$fNac;
			
		 }
		
		function toString() {
		
		return  parent::toString()." Sexo: ".$this->sexo." Localidad: ".$this->localidad ;
		
		}
		
		function getSexo() {
			return $this->sexo;
		}
		
		function getLoc() {
			return $this->localidado;
		}
		
		function getFNac() {
			return $this->fNacf;
		}
		
		function setSexo($sex) {
			
			$this->sexo=$sex;	
			
		}
		
		function setLoc($loc) {
			
			$this->localidado=$loc;	
			
		}
		
		function setFNac($fnac) {
			
			$this->fNac=$fnac;	
			
	}
			
		
	}


?>