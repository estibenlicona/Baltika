<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Users_model");
		$this->load->model("Manager_model");
		$this->load->model("Team_model");
	}
	public function update($id)
	{
		$datos['id'] = $id;
		$datos['username'] = $this->input->post('username');
		$datos['password'] = $this->input->post('password');
		$datos['pais'] = $this->input->post('pais');
		$datos['team'] = $this->input->post('team');
		$foto = $this->uploadImagen('foto');

		if ($foto == 'not_select') {
			$this->Users_model->updateUser($datos);
		}else {
			$datos['foto'] = $this->input->post('foto');
		}

		$usuarios = $this->Users_model->getUsers($this->session->userdata('usuario')->id);
		$this->session->set_userdata('usuarios',$usuarios);
		redirect(base_url('users'), 'location');

	}
	// Vista inicial para configurar Liga
	public function edit($id){

		$datos = ['usuario' => $this->Users_model->get($id),
	        'teams' => $this->Team_model->getNull($id),
					'paises' => $this->Manager_model->getPaises()];


		$this->load->view('header',array('title' => 'Edit User'));
		$this->load->view('nav');
		$this->load->view('menu');
		$this->load->view('forms/edit_user',$datos);

	}
	public function create(){

		$datos = ['paises' => $this->Manager_model->getPaises()];
		$this->load->view('header',array('title' => 'Create User'));
		if ($this->session->has_userdata('usuario')) {
			$this->load->view('nav');
			$this->load->view('menu');
		}
		$this->load->view('forms/register',$datos);
	}

	public function index()
	{
		if ($this->session->has_userdata('usuario')) {
			$this->load->view("header",array('title' => 'Users'));
			$this->load->view('nav');
			$this->load->view('menu');
			$this->load->view('users');
		}else {
			redirect(base_url('login'), 'location');
		}
	}

	public function add()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pais = $this->input->post('pais');
		$foto = $this->uploadImagen('foto');

		if ($this->session->userdata('usuario')->username) {
			$this->Users_model->set($username,$password,$pais,$foto,1);
			$usuarios = $this->Users_model->getUsers($this->session->userdata('usuario')->username);
			$this->session->set_userdata('usuarios',$usuarios);
			redirect(base_url('users'), 'location');
		}else {
			$this->Users_model->set($username,$password,$pais,$foto);
			redirect(base_url('login'), 'location');
		}
	}

	public function uploadImagen($name_imagen){
		$config = array(
			'upload_path' => './lib/logos',
			'allowed_types' => 'gif|jpg|png',
			'encrypt_name' => true
		);
		$this->upload->initialize($config);
		$this->upload->do_upload($name_imagen);
		$this->upload->do_upload($name_imagen);

		if ($this->upload->data('file_size') != 0) {
			if ($this->upload->data('file_ext') != '.png' || $this->upload->data('file_ext') != '.PNG') {
				return 'ext_invalid';
				exit;
			}
		}else {
			return 'not_select';
			exit;
		}
		return $this->upload->data('file_name');
	}

	public function status($id,$status)
	{
		$this->Users_model->updateStatus($id,$status);
		$usuarios = $this->Users_model->getUsers($this->session->userdata('usuario')->username);
		$this->session->set_userdata('usuarios',$usuarios);
		redirect(base_url('users'), 'location');

	}
}
