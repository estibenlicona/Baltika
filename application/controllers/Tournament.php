<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tournament extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Tournament_model");
	}
	// Vista inicial para configurar Liga
	public function index(){
		$data  = array('leagues' => $this->Tournament_model->getTournament());
		$datos_session = ['usuario' => $this->session->userdata('usuario')];
		$datosHeader['title'] = 'Leagues';
		$this->load->view("header",$datosHeader);
		$this->load->view('nav',$datos_session);
		$this->load->view('menu');
		$this->load->view('tournament',$data);
		$this->load->view('footer');
	}
	// Cargar Imagen
	public function uploadImagen($name_imagen){
		$config = array(
			'upload_path' => './lib/logos',
			'allowed_types' => 'png',
			'encrypt_name' => true
		);
		$this->upload->initialize($config);
		$this->upload->do_upload($name_imagen);
		$this->upload->do_upload($name_imagen);

		if ($this->upload->data('file_size') != 0) {
			if ($this->upload->data('file_ext') != '.png') {
				return 'ext_invalid';
				exit;
			}
		}else {
			return 'not_select';
			exit;
		}
		return $this->upload->data('file_name');
	}
	//Editar Liga
	public function edit(){
		$name_imagen = $this->uploadImagen('editLogo');
		$config = array(
				array(
					'field' => 'editNombre',
					'label' => 'nombre',
					'rules' => 'required',
					'errors' => array('required' => 'El %s es requerido')
				),
				array(
					'field' => 'editSocial',
					'label' => 'red social',
					'rules' => 'required',
					'errors' => array('required' => 'La %s es requerida')
				)
		);
		$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_rules($config);


		 if ($this->form_validation->run() == false || $name_imagen == 'ext_invalid') {
			 $errors = array(
				 'nombre' => form_error('editNombre'),
				 'social' => form_error('editSocial'),
				 'typeImagen' => $name_imagen
				);
			echo json_encode($errors);
			$this->output->set_status_header(400);
			exit;
		 }

		 if ($name_imagen == 'not_select') {
				$dataLeague = array(
					'id' => $this->input->post("editId"),
					'nombre' => $this->input->post("editNombre"),
					'social_network' => $this->input->post("editSocial")
				);
				$this->Tournament_model->editLeague($dataLeague);
				echo json_encode(array('url' => base_url('tournament')));
				exit;
		 }

		 $dataLeague = array(
			 'id' => $this->input->post("editId"),
			 'nombre' => $this->input->post("editNombre"),
			 'social_network' => $this->input->post("editSocial"),
			 'logo' => $name_imagen
		 );
		 $this->Tournament_model->editLeague($dataLeague);
		 echo json_encode(array('url' => base_url('tournament')));
	}
	//guardar Liga
	public function add(){
		$name_imagen = $this->uploadImagen('logo');
		$config = array(
				array(
					'field' => 'nombre',
					'label' => 'nombre',
					'rules' => 'required',
					'errors' => array('required' => 'El %s es requerido')
				),
				array(
					'field' => 'social',
					'label' => 'red social',
					'rules' => 'required',
					'errors' => array('required' => 'La %s es requerida')
				)
		);
		$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_rules($config);

		 if ($this->form_validation->run() == false || $name_imagen == 'ext_invalid') {
			 $errors = array(
				 'nombre' => form_error('nombre'),
				 'social' => form_error('social'),
				 'typeImagen' => $name_imagen
				);
			echo json_encode($errors);
			$this->output->set_status_header(400);
			exit;
		 }

		 if ($name_imagen == 'not_select') {
				$dataLeague = array(
					'nombre' => $this->input->post("nombre"),
					'social_network' => $this->input->post("social")
				);
				$this->Tournament_model->save($dataLeague);
				echo json_encode(array('url' => base_url('tournament')));
				exit;
		 }

		 $dataLeague = array(
			 'nombre' => $this->input->post("nombre"),
			 'social_network' => $this->input->post("social"),
			 'logo' => $name_imagen
		 );
		 $this->Tournament_model->save($dataLeague);
		 echo json_encode(array('url' => base_url('tournament')));
	}
	//Cambiar estado a liga
	public function delete($id){
		$this->Tournament_model->deleteTournament($id);
		redirect(base_url('tournament'), 'location');
	}

}
