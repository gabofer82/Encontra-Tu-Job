<?php
/**
 * 
 */
class EmpresaModel extends ModelBase {
  //Todo esto se puede ahorrar con interfaces
  //o con herencia.
  public function alta($datos)
  {
  	$sql = 'INSERT INTO etj_empresas VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
  	$consulta = $this->db->prepare($sql);
	//obtener ultimo ID
	$pass = md5($datos['txtUsrPass']);
	$consulta->execute(array($datos['txtUsrNom'], $pass,$datos['txtNombre'], 
		$datos['slcciudad'], $datos['slcpais']));
	return $consulta;
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
}

?>