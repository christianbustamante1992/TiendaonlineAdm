<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_usuario');		
	}

	public function index()
	{
		$this->load->view('layouts/headerlogin');
		$this->load->view('login');

	}

	public function iniciarsesion()
	{
		# code...
		$correo = $this->input->post('email');
		$contrasena = $this->input->post('contrasena');
		$bandera = $this->model_usuario->iniciarsesion($correo,$contrasena);
		if (count($bandera) > 0) {
			$datauser = array('id' => $bandera->id, 
                              'nombre' => $bandera->nombre,
                              'apellido' => $bandera->apellido,
                              'login' => TRUE
							 );
			$this->session->set_userdata($datauser);
			redirect('menu');
		}else{
			$this->session->set_flashdata("errorlogin","El usuario y/o contraseña son incorrectos");
			redirect("login");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


}