<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Team_model");
		$this->load->model("Manager_model");
		$this->load->model("Player_model");
		$this->load->model("Seanson_model");
	}
	public function index(){
		$datosHeader['title'] = 'Teams';
		$data  = [
			'managers' => $this->Manager_model->getManagers()];
		$teams = $this->Team_model->getTeams();
		$this->session->set_userdata('teams',$teams);
		$this->load->view("header",$datosHeader);
		$this->load->view('nav');
		$this->load->view('menu');
		$this->load->view('team',$data);
		$this->load->view('footer');

	}

	public function create_view()
	{
		$this->load->view('header',array('title' => 'Create Team'));
		$this->load->view('nav');
		$this->load->view('menu');
		$this->load->view('forms/register_team');
	}
	public function create()
	{
		$nombre = $this->input->post('nombre');
		$foto = $this->uploadImagen('foto');


		if (!is_null($this->Team_model->valideNombre($nombre))) {
			$this->session->set_flashdata('mensaje1', $nombre.' no esta disponible ...');
		}
		if ($foto=='ext_invalid') {
			$this->session->set_flashdata('mensaje2', 'Extención no valida ...');
		}

		if (!is_null($this->session->flashdata('mensaje1')) || !is_null($this->session->flashdata('mensaje2'))) {
			redirect(base_url('team/create_view'), 'location');
		}else {

			$this->Team_model->addTeam($nombre,$foto);
			redirect(base_url('team'), 'location');
		}
	}

		public function edit_view($id)
		{
			$datos['id'] = $id;
			$datos['team'] = $this->Team_model->get($id);
			$this->load->view('header',array('title' => 'Edit Team'));
			$this->load->view('nav');
			$this->load->view('menu');
			$this->load->view('forms/edit_team',$datos);
		}
	public function edit($id)
	{
		$nombre = $this->input->post('nombre');
		$foto = $this->uploadImagen('foto');
		$datos = $this->Team_model->getNombre($id);
		$nombre2 = $datos->nombre;

		$data['id'] = $id;
		if (!is_null($this->Team_model->valideNombre($nombre)) && $nombre2 !== $nombre) {
			$this->session->set_flashdata('mensaje1', $nombre.' no esta disponible ...');
		}else {
			$data['nombre'] = $nombre;
		}

		if ($foto != 'not_select') {
			if ($foto =='ext_invalid') {
				$this->session->set_flashdata('mensaje2', 'Extención no valida ...');
			}else {
				$data['foto'] = $foto;
			}
		}

		if (!is_null($this->session->flashdata('mensaje1')) || !is_null($this->session->flashdata('mensaje2'))) {
			redirect(base_url('team/edit_view/'.$id), 'location');
		}else {
			$this->Team_model->editTeam($data);
			redirect(base_url('team'), 'location');
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
			if ($this->upload->data('file_ext') != '.png' || $this->upload->data('file_ext') == '.PNG') {
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
		$this->Team_model->updateStatus($id,$status);
		$teams = $this->Team_model->getTeams();
		$this->session->set_userdata('teams',$teams);
		redirect(base_url('team'), 'location');
	}
}
