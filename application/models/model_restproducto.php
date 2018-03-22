<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 

*/
class Model_restproducto extends CI_Model
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
			$query = $this->db->query("SELECT * FROM producto,marca_producto WHERE producto.id = $id AND producto.id_marcaproducto = marca_producto.id_marca;");
			if ($query->num_rows() === 1) {
				# code...
				return $query->row_array();
			}

			return NULL;
		}

			$query = $this->db->query("SELECT * FROM producto,marca_producto WHERE producto.id_marcaproducto = marca_producto.id_marca AND producto.stock > 0;");
			if ($query->num_rows() > 0) {
				# code...
				return $query->result_array();
			}

			return NULL;

	}

	
	public function update($id,$producto)
	{
		# code...
		$this->db->where('id',$id);
		$resultado = $this->db->update('producto',$producto);
		if ($resultado === true) {
			# code...
			return true;
		}else{
			return NULL;
		}
	}

	

}

?>