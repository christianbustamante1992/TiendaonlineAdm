<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 

*/
class Model_restdetallecarrito extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function get($id = NULL)
	{
		# code...

		if (! is_null($id)) {
			# code...
			$query = $this->db->select('*')->from('detalle_carrito')->where('id_carritodetalle',$id)->get();
			if ($query->num_rows() === 1) {
				# code...
				return $query->row_array();
			}

			return NULL;
		}

			$query = $this->db->query("SELECT *FROM detalle_carrito, producto WHERE detalle_carrito.id_producto=producto.id;");
			if ($query->num_rows() > 0) {
				# code...
				return $query->result_array();
			}

			return NULL;

	}

	public function save($producto)
	{
		# code...
		$consulta = $this->db->insert('detalle_carrito', $producto);
		if ($consulta == true) {
			# code...
			return true;
		}else{
			return NULL;
		}
	}

	public function update($id,$producto)
	{
		# code...
		$this->db->where('id_carritodetalle',$id);
		$resultado = $this->db->update('detalle_carrito',$producto);
		if ($resultado === true) {
			# code...
			return true;
		}else{
			return NULL;
		}
	}

	public function delete($id)
	{
		# code...
		$this->db->where('id_carritodetalle',$id)->delete('detalle_carrito');
		if ($this->db->affected_rows()===1) {
			# code...
			return TRUE;
		}

		return NULL;

	}

	

}

?>