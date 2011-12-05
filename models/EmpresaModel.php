<?php
/**
 * 
 */
include_once 'usuario_admin.class.php';
include_once 'classes/empresa.class.php';

class EmpresaModel extends UsuarioAdmin {
  //Todo esto se puede ahorrar con interfaces
  //o con herencia.
  
  public function __construct() {
	}
  
  public function alta($post)
  {
  	if (!$this -> validarNombreUsuario($post['txtUsrNom'])) {
			return false;
			exit;
		}

		$ciunum = $this -> validarCiudad($post['slcciudad'], 0);
		if (!$ciunum) {
			return false;
			exit;
		}

		$conexion = DataBase::getInstance();
		$id = $this -> calcularID();
		$objE = new Empresa($id, $post['txtUsrNom'], $post['txtUsrPass'], $post['txtNombre'], $post['slcciudad'], 0);
		$objE = new Empresa($id, $nick, $pass, $nom, $ciunum, $pais);

		$sentenciaSql = "insert into etj_usuarios (usr_nick,usr_pass,pa_id,ciu_id) values ('" . $objE -> getNick() . "','" . 
		$objE -> getPass() . "'," . $objE -> getPais() . ",'" . $objE -> getCiudad() . "')";
			echo var_dump($sentenciaSql);
		$conexion -> ejecutarSentencia($sentenciaSql);

		if ($conexion) {

			$sentenciaSql = "insert into etj_empresas(emp_id,emp_nom) 
values (" . $objE -> getID() . ",'" . $objE -> getNom() . "')";
			echo var_dump($sentenciaSql);
			$conexion -> ejecutarSentencia($sentenciaSql);

			if ($conexion) {

				return $objE->getID();
			}
		}
  }
  
  public function baja($idEmpresa)
  {
  	/*Baja lógica consiste en alterar
	 *un campo "baja". 
	 */
  }
  
  public function modificar($datos)
  {
  	
  }
  
  public function obtenerDatos($id)
  {
  	
  }
  
  public function listarCiudades()
  {
  		return $this->obtenerCiudades();
  }
}

?>