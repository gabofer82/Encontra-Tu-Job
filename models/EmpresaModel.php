<?php
/**
 * 
 */
class EmpresaModel extends ModelBase {
  //Todo esto se puede ahorrar con interfaces
  //o con herencia.
  public function alta($datos)
  {
  	$sqlUsuario = 'INSERT INTO etj_usuarios (usr_nick, usr_pass, pa_id, ciu_id) VALUES (:usr_nick, :usr_pass, :pa_id, :ciu_id)';	
	$consultaU = $this->db->prepare($sqlUsuario);
	$ultimoIdUsr = $this->db->lastInsertId();
	$pass = md5($datos['txtUsrPass']);
	$consultaU->execute(array(':usr_nick'=>$datos['txtUsrNom'], 
								':usr_pass'=>$pass,
								':pa_id'=> 0, 
								':ciu_id'=>$datos['slcciudad']));
	
  	$sqlEmpresa = 'INSERT INTO etj_empresas (emp_id, emp_nom) VALUES (:emp_id, :emp_nom)';
  	$consultaE = $this->db->prepare($sqlEmpresa);
	$ultimoIdUsr = $ultimoIdUsr++;
	$consultaE->execute(array(':emp_id'=>$ultimoIdUsr,
								':emp_nom'=>$datos['txtNombre']));
	return $ultimoIdUsr;
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
  		//realizamos la consulta de todos los items
		$consulta = $this->db->prepare('SELECT * FROM etj_ciudades');
		$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		return $consulta;
  }
}

?>