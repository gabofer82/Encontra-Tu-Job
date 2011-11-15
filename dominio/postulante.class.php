<?php

	/**
	 *  Clase encargada de representar los Usuarios Postulantes
	 */
	class Postulante extends Usuario  {
		
		private $apellido;
		private $usrNom;
		private $fNac;
		private $sexo;
		
		function __construct($nom,$mail,$pass,$telefono,$localidad,
		$codigoPostal,$ape,$usrNom,$fNac,$sexo) {
			
			parent:__construct($nom,$mail,$pass,$telefono,$localidad,$codigoPostal);
			
			$this->apellido=$ape;
			$this->usrNom=$usrNomu;
			$this->fNac=$fNac;
			$this->sexo=$sexo;
						
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