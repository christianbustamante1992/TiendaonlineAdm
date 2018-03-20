<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 

*/
class Model_resttipoproducto extends CI_Model
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
			$query = $this->db->query("SELECT *FROM producto,marca_producto WHERE producto.id_tipoproducto=$id AND producto.id_marcaproducto = marca_producto.id_marca AND producto.stock > 0;");
			if ($query->num_rows() > 0) {
				# code...
				return $query->result_array();
			}

			return NULL;
		}

			$query = $this->db->query("SELECT DISTINCT tipo_producto.id_tipoproducto, tipo_producto.nombre_tipoproducto FROM tipo_producto, producto WHERE tipo_producto.id_tipoproducto = producto.id_tipoproducto AND producto.stock > 0;");
			if ($query->num_rows() > 0) {
				# code...
				return $query->result_array();
			}

			return NULL;

	}

}

?>