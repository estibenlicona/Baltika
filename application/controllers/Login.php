<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->model("Login_model");
		$this->load->model("Users_model");
		$this->load->model("Manager_model");
		$this->load->model("Team_model");
	}
  public function index()
  {
		if ($this->session->has_userdata('usuario')) {
			redirect(base_url('home'), 'location');
		}else {
			$datosHeader = ['title' => 'Login'];
			$this->load->view('header',$datosHeader);
			$this->load->view('index');
			$this->load->view('footer');
		}
  }
  public function validate()
  {
    $username = $this->input->post('username');
    $pass = $this->input->post('pass');
    $usuario = $this->Login_model->get($username,$pass);

		if (is_null($usuario)) {
			$this->session->set_flashdata('mensaje', '¡Datos Incorrectos!');
			redirect(base_url('login'), 'location');
		}
    if (isset($usuario) && $usuario->estado == 0) {
			$this->session->set_flashdata('mensaje', '¡Confirmación Pendiente!');
			redirect(base_url('login'), 'location');
		}else {

			$this->session->set_userdata('usuario',$usuario);
			$usuarios = $this->Users_model->getUsers($username);
			$paises = $this->Manager_model->getPaises();
			$teams = $this->Team_model->getTeams();

			$this->session->set_userdata('usuarios',$usuarios);
			$this->session->set_userdata('paises',$paises);
			$this->session->set_userdata('teams',$teams);

			redirect(base_url('home'), 'location');
		}
	}
	public function session_destroy()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'), 'location');
	}
}
