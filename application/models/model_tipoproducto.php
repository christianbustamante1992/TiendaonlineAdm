<?php 

/**
* 
*/
class Model_tipoproducto extends CI_Model
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->database();
	}

	public function listartipoproducto()
	{
		# code...
		$consulta = $this->db->query("SELECT * FROM tipo_producto;");
		$resultado = $consulta->result();
		return $resultado;
	}

	public function registrartipoproducto($datos)
	{
		
		$consulta = $this->db->insert('tipo_producto', $datos);
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function eliminartipoproducto($id)
	{
		$consulta = $this->db->query("DELETE FROM tipo_producto WHERE id_tipoproducto = $id;");
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function obtenertipoproducto($id)
	{
		$consulta = $this->db->query("SELECT * FROM tipo_producto WHERE id_tipoproducto = $id;");
		$resultado = $consulta->row();
		return $resultado;
	}

	public function actualizartipoproducto($id,$data)
	{
		$this->db->where('id_tipoproducto',$id);
		return $this->db->update('tipo_producto',$data);
	}
}

?>