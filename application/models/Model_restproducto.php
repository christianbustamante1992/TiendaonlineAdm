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
		$this->db->set($this->setproducto($producto))->where('id',$id)->update('producto');
		if ($this->db->affected_rows()===1) {
			# code...
			return TRUE;
		}

		return NULL;
	}

	private function setproducto($producto)
	{
		# code...
		$data = array('id_tipoproducto' => $producto['id_tipoproducto'], 
					  'id_marcaproducto' => $producto['id_marcaproducto'],
					  'nombre' => $producto['nombre'],
					  'descripcion' => $producto['descripcion'],
					  'stock' => $producto['stock'],
					  'precio_a' => $producto['precio_a'],
					  'precio_b' => $producto['precio_b'],
					  'precio_c' => $producto['precio_c'],
					  'nombre_foto' => $producto['nombre_foto']

					 );
		return $data;
	}

	

}

?>