<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Usuario extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_usuario');
		$this->load->library('form_validation');
		$this->load->library('session');

		
	}

	public function index()
	{
		# code...
		$datasesion = $this->session->get_userdata();
		$data = array('usuario' => $this->model_usuario->obtener($datasesion['id']));
		$this->load->view('layouts/header');
		$this->load->view('usuarios/perfil',$data);
	}

	public function registrarusuario()
	{
		
		$this->load->view('layouts/headerlogin');
		$this->load->view('usuarios/registrarusuario');

	}

	private function enviaremail($correo,$contrasena)
	{
		# code...
		//$this->load->library('email');
		$config = array('protocol' => 'smtp',
						 'smtp_host' => 'ssl://smtp.gmail.com',
						 'smtp_port' => 465,
						 'smtp_user' => 'chrisysandra1992@gmail.com',
						 'smtp_pass' => 'chaparro2017',
						 'mailtype' => 'html',
						 'charset' => 'utf-8',
						 'newline' => "\r\n"
						 );
		$mensaje = "Para validar su cuenta haga click aqui "."<a href='#'>Valide su cuenta</a><br>".$contrasena;
		$this->email->initialize($config);
		$this->email->from('chrisysandra1992@gmail.com');
		$this->email->to((string)$correo);
		$this->email->subject('Validar Cuenta PC LOJA');
		$this->email->message($mensaje);

		$this->email->send();
		 //con esto podemos ver el resultado
		 var_dump($this->email->print_debugger());

	}


	public function crearusuario()
	{

		$datos = array(
			'id' => NULL,
			'id_tipousuario' => $this->input->post('tipousuario'),
			'cedula' => $this->input->post('cedula'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'correo' => $this->input->post('correo'),
			'telefono' => $this->input->post('telefono'),
			'fecha_nacimiento' => $this->input->post('fechanacimiento'),
			'contrasena' => md5($this->input->post('contrasena'))
		);

		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[10]|max_length[10]|numeric|is_unique[usuario.cedula]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('correo', 'Corrreo', 'required|max_length[100]|valid_email|is_unique[usuario.correo]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|min_length[10]|max_length[10]|numeric|is_unique[usuario.telefono]');
		$this->form_validation->set_rules('contrasena', 'Contrasena', 'required|min_length[10]|max_length[30]|matches[contrasena2]');
		$this->form_validation->set_rules('contrasena2', 'Contrasena', 'required|min_length[10]|max_length[30]|matches[contrasena]');

		
		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_usuario->registrar($datos);
			if ($respuesta == true) {
				# code...
				//$this->enviaremail($this->input->post('correo'), md5($this->input->post('contrasena')));
				redirect('login');
			}else{
			
			echo "no se registro en la base datos";
			}
			
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			$this->load->view('layouts/headerlogin');
			$this->load->view('usuarios/registrarusuario');

			//echo "no paso validacion";
			
		}
		
	}


	public function actualizarusuario()
	{
		$datauser = $this->session->get_userdata();
		$datos = array(
			'id' => $datauser['id'],
			'id_tipousuario' => '1',
			'cedula' => $this->input->post('cedula'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'correo' => $this->input->post('correo'),
			'telefono' => $this->input->post('telefono'),
			'fecha_nacimiento' => $this->input->post('fechanacimiento'),
			'contrasena' => md5($this->input->post('contrasena'))
		);

		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha|min_length[1]|max_length[200]');
		$this->form_validation->set_rules('correo', 'Corrreo', 'required|max_length[100]|valid_email');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('contrasena', 'Contrasena', 'required|min_length[10]|max_length[30]');
		

		
		if ($this->form_validation->run() != false) {
			# code...
			$respuesta = $this->model_usuario->actualizar($datauser['id'],$datos);
			if ($respuesta == true) {
				
				redirect('menu');
			}else{
			
			echo "No se actualizo correctamente";
			}
			
		}else{
			/*$mensaje["msm"] = "No se Registro correctamente";*/
			
			$data = array('usuario' => $this->model_usuario->obtener($datauser['id']));
			$this->load->view('layouts/header');
			$this->load->view('usuarios/perfil',$data);

			//echo "no paso validacion";
			
		}
		
	}
}

