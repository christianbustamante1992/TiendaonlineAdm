<?php 

/**
* 
*/
class Model_usuario extends CI_Model
{
	
	public function __construct()
	{
		# code...
		parent::__construct();

		$this->load->database();
	}

	public function iniciarsesion($correo, $contrasena)
	{
		# code...
		$consulta = $this->db->query("SELECT * FROM usuario where correo = '$correo' AND contrasena = '$contrasena';");
		$resultado = $consulta->row();
		return $resultado;
	}

	public function registrar($datos)
	{
		
		$consulta = $this->db->insert('usuario', $datos);
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function obtener($id)
	{
		
		$consulta = $this->db->query("SELECT * FROM usuario where id = '$id';");
		$resultado = $consulta->row();
		return $resultado;
	}

	public function actualizar($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('usuario',$data);
	}
}

?>