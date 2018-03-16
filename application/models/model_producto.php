<?php 

/**
* 
*/
class Model_producto extends CI_Model
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->database();
	}

	public function registrar($datos)
	{
		
		$consulta = $this->db->insert('producto', $datos);
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function eliminar($id)
	{
		$consulta = $this->db->query("DELETE FROM producto WHERE id = $id;");
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function actualizar($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('producto',$data);
	}

	public function obtener($id)
	{
		$consulta = $this->db->query("SELECT * FROM producto WHERE id = $id;");
		$resultado = $consulta->row();
		return $resultado;
	}
	
	public function listarproductos()
	{
		# code...
		$consulta = $this->db->query("SELECT * FROM producto, marca_producto, tipo_producto WHERE producto.id_marcaproducto=marca_producto.id_marca AND producto.id_tipoproducto=tipo_producto.id_tipoproducto;");
		$resultado = $consulta->result();
		return $resultado;
	}

	
}

?>