<?php

/**
 *  Representa las demandas de trabajo de las empresas
 */
class Demandas {

	private $id;
	private $titulo;
	private $empresa;
	private $referencia;
	private $descripcion;
	private $perfil;
	private $cargo;
	private $horario;
	private $vacantes;
	private $nivel;
	private $idioma;
	private $conocimientos;
	private $fechapubli;
	private $fechacierre;
	private $postulados;

	public function __construct($id,$titulo, $empresa, $referencia, $descripcion, $horario, $vacantes, $nivel, $postulados) {

		$this-> id = $id;
		$this -> titulo = $titulo;
		$this -> empresa = $empresa;
		$this -> referencia = $referencia;
		$this -> descripcion = $descripcion;
		$this -> horario = $horario;
		$this -> vacantes = $vacantes;
		$this -> nivel = $nivel;
		$this -> postulados = $postulados;
	}

	public function getId() {
		return $this -> id;
	}

	public function getTitulo() {
		return $this -> titulo;
	}

	public function getEmpresa() {
		return $this -> empresa;
	}

	public function getReferecnia() {
		return $this -> referencia;
	}

	public function getDescripcion() {
		return $this -> descripcion;
	}

	public function getPerfil() {
		return $this -> perfil;
	}

	public function getCargo() {
		return $this -> cargo;
	}

	public function getHorario() {
		return $this -> horario;
	}

	public function getVacantes() {
		return $this -> vacantes;
	}

	public function getNivelEstudio() {
		return $this -> nivel;
	}

	public function getIdioma() {
		return $this -> idioma;
	}

	public function getConocimientos() {
		return $this -> conocimientos;
	}

	public function getFechaPublicada() {
		return $this -> fechapubli;
	}

	public function getFechaCierre() {
		return $this -> fechacierre;
	}

	public function getPostulados() {
		return $this -> postulados;
	}

	public function setID($id) {$this -> id = $id;
	}

	public function setTitulo($titulo) {$this -> titulo = $titulo;
	}

	public function setEmpresa($emp) {$this -> empresa = $emp;
	}

	public function setReferencia($ref) {$this -> referencia = $ref;
	}

	public function setDescripcion($desc) {$this -> descripcion = $desc;
	}

	public function setPerfilLaboral($perfil) {$this -> perfil = $perfil;
	}

	public function setCargo($cargo) {$this -> cargo = $cargo;
	}

	public function setHorario($horario) {$this -> horario = $horario;
	}

	public function setVacantes($vacantes) {$this -> vacantes = $vacantes;
	}

	public function setNivelEstudios($nivel) {$this -> nivel = $nivel;
	}

	public function setIdioma($idioma) {$this -> idioma = $idioma;
	}

	public function setConocimientos($con) {$this -> conocimientos = $con;
	}

	public function setFPubli($fPub) {$this -> fechapubli = $fPub;
	}

	public function setFCierre($fCie) {$this -> fechacierre = $fCie;
	}

	public function setPostulados($postu) {$this -> postulados = $postu;
	}

}
?>