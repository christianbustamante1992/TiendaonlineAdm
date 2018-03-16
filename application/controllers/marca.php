<?php 

/**
* 
*/
class Marca extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_marca');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			# code...
			$data = array('marca' => $this->model_marca->listarmarcas());
			$this->load->view('layouts/header');
			$this->load->view('marcas/marca',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function guardarmarca()
	{
	# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
		$datos = array('id_marca' => NULL, 'nombre_marca' => $this->input->post('nombre') );
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]|alpha|is_unique[marca_producto.nombre_marca]');

		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_marca->registrarmarca($datos);
			if ($respuesta == true) {
				redirect('marca');
			}else{
			$this->session->set_flashdata("error", "No se registro correctamente.");
			redirect('marca');
			}
			
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			$data = array('marca' => $this->model_marca->listarmarcas());
			$this->load->view('layouts/header');
			$this->load->view('marcas/marca',$data);

			//echo "no paso validacion";
			
		}
		}else{
			redirect(base_url());
		}

	}

	public function eliminarmarca($id)
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
		$estado = $this->model_marca->eliminarmarca($id);
		redirect('marca');
		//echo $estado;
		}else{
			redirect(base_url());
		}
	}

	public function editarmarca($id)
	{
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
		$data = array('marca' => $this->model_marca->obtenermarca($id));
		$this->load->view('layouts/header');
		$this->load->view('marcas/editarmarca',$data);
		}else{
			redirect(base_url());
		}
	}

	public function actualizarmarca()
	{
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {

		$datos = array('id_marca' => $this->input->post('id'), 'nombre_marca' => $this->input->post('nombre') );
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]|alpha|is_unique[marca_producto.nombre_marca]');

		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_marca->actualizarmarca($this->input->post('id'),$datos);
			if ($respuesta == true) {
				redirect('marca');
			}else{
			$this->session->set_flashdata("error", "No se actualizo correctamente.");
			redirect('marca');
			}
			
		}else{
			
			$this->editarmarca($this->input->post('id'));

			
			
		}
	}else{
			redirect(base_url());
		}
	}
}

 ?>