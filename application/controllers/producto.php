<?php 

/**
* 
*/
class Producto extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_producto');
		$this->load->model('model_marca');
		$this->load->model('model_tipoproducto');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$this->load->view('layouts/header');
			$this->load->view('menuprueba');
		}else{
			redirect(base_url());
		}
		
	}

	public function registrarproducto()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$data = array('marca' => $this->model_marca->listarmarcas(), 
 					  'tipoproducto' => $this->model_tipoproducto->listartipoproducto()
					 );
			$this->load->view('layouts/header');
			$this->load->view('productos/registrarproducto',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function guardarproducto()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[200]|is_unique[producto.nombre]');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|max_length[200]');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric|min_length[1]');
		$this->form_validation->set_rules('precioa', 'Precio A', 'required|decimal|min_length[4]');
		$this->form_validation->set_rules('preciob', 'Precio B', 'required|decimal|min_length[4]');
		$this->form_validation->set_rules('precioc', 'Precio C', 'required|decimal|min_length[4]');

		if (($this->form_validation->run() != false) && ((int)$this->input->post('stock')>0)) {
			# code...

			$config['upload_path'] = "./uploads/";
	        //$config['file_name'] = "nombre_archivo";
	        $config['allowed_types'] = "gif|jpg|jpeg|png";
	        $this->load->library('upload',$config);

			if ($this->upload->do_upload("foto_producto")) {
				# code...
			$data = array("upload_data" => $this->upload->data());

			$datos = array('id' => NULL, 
					   'id_tipoproducto' => $this->input->post('tipoproducto'),
					   'id_marcaproducto' => $this->input->post('marca'),
					   'nombre' => $this->input->post('nombre'),
					   'descripcion' => $this->input->post('descripcion'),
					   'stock' => $this->input->post('stock'),
					   'precio_a' => $this->input->post('precioa'),
					   'precio_b' => $this->input->post('preciob'),
					   'precio_c' => $this->input->post('precioc'),
					   'nombre_foto' => $data['upload_data']['file_name']
					   );

			$respuesta = $this->model_producto->registrar($datos);
			if ($respuesta == true) {
				redirect('menu');
			}else{
			
			redirect('producto/registrarproducto');
			}
		}else{
			echo $this->upload->display_errors();
		}	
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			$this->session->set_flashdata('item','El stock debe ser mayor a 0.'); 
			$data = array('marca' => $this->model_marca->listarmarcas(), 
 					  'tipoproducto' => $this->model_tipoproducto->listartipoproducto()
					 );
			$this->load->view('layouts/header');
		$this->load->view('productos/registrarproducto',$data);

			//echo "no paso validacion";
			
		}
		}else{
			redirect(base_url());
		}	
	}

	public function updateproducto()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[200]');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|max_length[200]');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric|min_length[1]');
		$this->form_validation->set_rules('precioa', 'Precio A', 'required|decimal|min_length[4]');
		$this->form_validation->set_rules('preciob', 'Precio B', 'required|decimal|min_length[4]');
		$this->form_validation->set_rules('precioc', 'Precio C', 'required|decimal|min_length[4]');

		if (($this->form_validation->run() != false) && ((int)$this->input->post('stock')>0)) {
			# code...
			$config['upload_path'] = "./uploads/";
	        //$config['file_name'] = "nombre_archivo";
	        $config['allowed_types'] = "gif|jpg|jpeg|png";
	        $this->load->library('upload',$config);

			if ($this->upload->do_upload("foto_producto")) {
				# code...
			$data = array("upload_data" => $this->upload->data());

			$datos = array('id' => NULL, 
					   'id_tipoproducto' => $this->input->post('tipoproducto'),
					   'id_marcaproducto' => $this->input->post('marca'),
					   'nombre' => $this->input->post('nombre'),
					   'descripcion' => $this->input->post('descripcion'),
					   'stock' => $this->input->post('stock'),
					   'precio_a' => $this->input->post('precioa'),
					   'precio_b' => $this->input->post('preciob'),
					   'precio_c' => $this->input->post('precioc'),
					   'nombre_foto' => $data['upload_data']['file_name']
					   );
			$respuesta = $this->model_producto->actualizar($this->input->post('id'),$datos);
			if ($respuesta == true) {
				redirect('menu');
			}else{
			
			redirect('producto/editarproducto/'.$this->input->post('id'));
			}
			}else{
			echo $this->upload->display_errors();
		}	
			
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			$this->session->set_flashdata('item','El stock debe ser mayor a 0.'); 
			$this->editarproducto($this->input->post('id'));

			//echo "no paso validacion";
			
		}
		}else{
			redirect(base_url());
		}
	}

	public function editarproducto($id)
	{
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$data = array('producto' => $this->model_producto->obtener($id),
				      'marca' => $this->model_marca->listarmarcas(), 
 					  'tipoproducto' => $this->model_tipoproducto->listartipoproducto()
					 );
		$this->load->view('layouts/header');
		$this->load->view('productos/editarproducto',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function eliminarproducto($id)
	{
	
		$datasesion = $this->session->get_userdata();
		if ($datasesion['id']!=NULL) {
			$estado = $this->model_producto->eliminar($id);
		redirect('menu');
		}else{
			redirect(base_url());
		}
		
	}

	
	
}

?>