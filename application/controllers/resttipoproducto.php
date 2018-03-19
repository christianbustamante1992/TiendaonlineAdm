<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/

require APPPATH . "/libraries/REST_Controller.php";

/**
* 
*/
class Resttipoproducto extends REST_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_resttipoproducto');
	}

		public function index_get()
	{
		# code...
		$productos = $this->model_resttipoproducto->get();
		if (! is_null($productos)) {
			# code...
			$this->response(array('response' => $productos),200);
		}else{
			$this->response(array('error' => 'No existen productos'),404);
		}
	}

		
	public function find_get($id)
	{
		# code...
		if (! $id) {
			# code...
			$this->response(NULL, 400);
		}

		$productos = $this->model_resttipoproducto->get($id);
		if (! is_null($productos)) {
			# code...
			$this->response(array('response' => $productos),200);
		}else{
			$this->response(array('error' => 'No existen productos'),404);
		}
	}
}

 ?>