<?php 

/**
* 
*/
class Model_marca extends CI_Model
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->database();
	}

	public function listarmarcas()
	{
		# code...
		$consulta = $this->db->query("SELECT * FROM marca_producto;");
		$resultado = $consulta->result();
		return $resultado;
	}

	public function registrarmarca($datos)
	{
		
		$consulta = $this->db->insert('marca_producto', $datos);
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function eliminarmarca($id)
	{
		$consulta = $this->db->query("DELETE FROM marca_producto WHERE id_marca = $id;");
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function obtenermarca($id)
	{
		$consulta = $this->db->query("SELECT * FROM marca_producto WHERE id_marca = $id;");
		$resultado = $consulta->row();
		return $resultado;
	}

	public function actualizarmarca($id,$data)
	{
		$this->db->where('id_marca',$id);
		return $this->db->update('marca_producto',$data);
	}
}

?>