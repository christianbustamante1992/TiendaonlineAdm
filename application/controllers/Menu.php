<?php 

/**
* 
*/
class Menu extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_producto');
		
	}

	public function index()
	{
		$sesion = $this->session->get_userdata();
		if ($sesion['id'] != NULL) {
			# code...
			$data["productos"] = $this->model_producto->listarproductos();
			$this->load->view('layouts/header');
			$this->load->view('menu',$data);
		}else{
			redirect(base_url());
		}
		
		
	}

	public function pruebarestapi()
	{
		$sesion = $this->session->get_userdata();
		if ($sesion['id'] != NULL) {
			# code...
			
			$this->load->view('layouts/header');
			$this->load->view('menupruebarestapi');
		}else{
			redirect(base_url());
		}
		
		
	}
}

 ?>