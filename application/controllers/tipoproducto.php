<?php 

/**
* 
*/
class Tipoproducto extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_tipoproducto');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$data = array('tipoproducto' => $this->model_tipoproducto->listartipoproducto());
			$this->load->view('layouts/header');
			$this->load->view('tipoproductos/tipoproducto',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function guardartipoproducto()
	{
	# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$datos = array('id_tipoproducto' => NULL, 'nombre_tipoproducto' => $this->input->post('nombre') );
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]|is_unique[tipo_producto.nombre_tipoproducto]');

		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_tipoproducto->registrartipoproducto($datos);
			if ($respuesta == true) {
				redirect('tipoproducto');
			}else{
			$this->session->set_flashdata("error", "No se registro correctamente.");
			redirect('tipoproducto');
			}
			
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			$data = array('tipoproducto' => $this->model_tipoproducto->listartipoproducto());
			$this->load->view('layouts/header');
			$this->load->view('tipoproductos/tipoproducto',$data);

			//echo "no paso validacion";
			
		}
		}else{
			redirect(base_url());
		}
		

	}

	public function eliminartipoproducto($id)
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$estado = $this->model_tipoproducto->eliminartipoproducto($id);
			redirect('tipoproducto');
		}else{
			redirect(base_url());
		}
		
		//echo $estado;
	}

	public function editartipoproducto($id)
	{
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$data = array('tipoproducto' => $this->model_tipoproducto->obtenertipoproducto($id));
			$this->load->view('layouts/header');
			$this->load->view('tipoproductos/editartipoproducto',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function actualizartipoproducto()
	{
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$datos = array('id_tipoproducto' => $this->input->post('id'), 'nombre_tipoproducto' => $this->input->post('nombre') );
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]');

		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_tipoproducto->actualizartipoproducto($this->input->post('id'),$datos);
			if ($respuesta == true) {
				redirect('tipoproducto');
			}else{
			$this->session->set_flashdata("error", "No se actualizo correctamente.");
			redirect('tipoproducto');
			}
			
		}else{
			
			$this->editartipoproducto($this->input->post('id'));

			
			
		}
		}else{
			redirect(base_url());
		}
		
	}
}

 ?>