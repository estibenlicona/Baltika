<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("League_model");
	}

	public function list_league(){
		$data  = array(
			'leagues' => $this->League_model->getLeagues()
		);

		$datosHeader['title'] = 'Leagues';
		$this->load->view("header",$datosHeader);
		$this->load->view('menu');
		$this->load->view('admin/list_league',$data);
	}
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

	public function edit_league(){
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
				$this->League_model->editLeague($dataLeague);
				echo json_encode(array('url' => base_url('Admin/list_league')));
				exit;
		 }

		 $dataLeague = array(
			 'id' => $this->input->post("editId"),
			 'nombre' => $this->input->post("editNombre"),
			 'social_network' => $this->input->post("editSocial"),
			 'logo' => $name_imagen
		 );
		 $this->League_model->editLeague($dataLeague);
		 echo json_encode(array('url' => base_url('Admin/list_league')));
	}
	public function save_league(){
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
				$this->League_model->save($dataLeague);
				echo json_encode(array('url' => base_url('Admin/list_league')));
				exit;
		 }

		 $dataLeague = array(
			 'nombre' => $this->input->post("nombre"),
			 'social_network' => $this->input->post("social"),
			 'logo' => $name_imagen
		 );
		 $this->League_model->save($dataLeague);
		 echo json_encode(array('url' => base_url('Admin/list_league')));
	}
	public function state_league(){
		$id = $this->input->post("id");
		$this->League_model->updateStateLeague($id);
		echo json_encode(array('url' => base_url('Admin/list_league')));
	}
	public function list_seanson(){
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Seansons';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$this->load->view('admin/list_seanson',$datos);
	}
	public function add_seanson(){
    $datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Add Seanson';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$datos['footer'] = $this->load->view('footer',$datosHeader,true);
		$this->load->view('admin/add_seanson',$datos);
	}
}
