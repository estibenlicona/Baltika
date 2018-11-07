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

	public function list_league()
	{
		$data  = array(
			'leagues' => $this->League_model->getLeagues()
		);

		$datosHeader['title'] = 'Leagues';
		$this->load->view("header",$datosHeader);
		$this->load->view('menu');
		$this->load->view('admin/list_league',$data);
	}
	public function uploadImagen()
	{
		$config = array(
			'upload_path' => './lib/logos',
			'allowed_types' => 'png',
			'encrypt_name' => true
		);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('editLogo')) {
			$data = $this->upload->data();
			return $data['file_name'];
		}else {
			return $this->upload->display_errors('', '');
		}
	}

	public function edit_league(){
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
		$this->form_validation->run();
		$errors = array(
			'nombre' => form_error('editNombre'),
			'social' => form_error('editSocial'),
			'typeImagen' => ''
		 );
		if ($_FILES['editLogo']['size']>0) {
			$imagen = $this->uploadImagen();
			$errors['typeImagen'] = $imagen;
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else {
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}

/*
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
		if($this->form_validation->run() === false){
			$errors = array(
				'nombre' => form_error('editNombre'),
				'social' => form_error('editSocial'),
				'errorUpdate' => '',
				'typeImagen' => ''
			 );
			 echo json_encode($errors);
			 $this->output->set_status_header(400);
			 exit;
    }

		$id = $this->input->post("editId");
		$nombre = $this->input->post("editNombre");
		$social = $this->input->post("editSocial");

		if ($_FILES['editLogo']['size']>0) {
			$configUpload = array(
				'upload_path' => './lib/logos',
				'allowed_types' => 'png',
				'encrypt_name' => true
			);
			$this->upload->initialize($configUpload);
			if ($this->upload->do_upload('editLogo')) {
				$datosImagen = $this->upload->data();
				$logo = $datosImagen['file_name'];
				$dataLeague = array(
					'id' => $id,
					'nombre' => $nombre,
					'social_network' => $social,
					'logo' => $logo
				);
			}else {
				$errorImagen = true;
			}
		}else{
			$dataLeague = array(
				'id' => $id,
				'nombre' => $nombre,
				'social_network' => $social
			);
		}
		if (isset($errorImagen)) {
			$errors = array(
				'nombre' => form_error('editNombre'),
				'social' => form_error('editSocial'),
				'errorUpdate' => '',
				'typeImagen' => 'Seleccione una imagen con formato PNG'
			 );
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else {
			if ($this->League_model->editLeague($dataLeague)) {
			echo json_encode(array('url' => base_url('Admin/list_league')));
			}else {
				//$errors['errorUpdate'] = 'No se pudo actualizar';
				echo json_encode($errors);
				$this->output->set_status_header(400);
			}
		}
		*/
	}
	public function state_league()
	{
		$id = $this->input->post("id");
		$this->League_model->updateStateLeague($id);
		echo json_encode(array('url' => base_url('Admin/list_league')));
	}
	public function save_league()
	{

		$config = array(
				array(
					'field' => 'nombre',
					'label' => 'Nombre',
					'rules' => 'required',
					'errors' => array('required' => 'El %s es requerido')
				),
				array(
					'field' => 'social',
					'label' => 'Red Social',
					'rules' => 'required',
					'errors' => array('required' => 'La %s es requerida')
				)
		);
		$this->form_validation->set_error_delimiters('','');
		$this->form_validation->set_rules($config);

		if($this->form_validation->run() === false){
			$errors = array(
				'nombre' => form_error('nombre'),
				'social' => form_error('social')
			 );
			 echo json_encode($errors);
			 $this->output->set_status_header(400);
    }else {
			$configUpload = array(
				'upload_path' => './lib/logos',
				'allowed_types' => 'png',
				'encrypt_name' => true
			);
			$this->load->library('upload', $configUpload);
			if ($this->upload->do_upload('logo')) {
				$datosImagen = $this->upload->data();

				$nombre = $this->input->post("nombre");
				$social = $this->input->post("social");
				$logo = $datosImagen['file_name'];
				$date = date('Y-m-d');
				$dataLeague = array(
					'nombre' => $nombre,
					'social_network' => $social,
					'logo' => $logo,
					'date' => $date
				);
				////////////////////////////////////////////
				if ($this->League_model->save($dataLeague)) {
					echo json_encode(array('url' => base_url('Admin/list_league')));
				}else {
					echo json_encode(array('error' => true));
				}
			}else {
				//$this->upload->display_errors();
				echo json_encode(array('typeImagen' => true));
			}
    }
	}
	public function list_seanson()
	{
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Seansons';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$this->load->view('admin/list_seanson',$datos);
	}
	public function add_seanson()
	{
    $datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Add Seanson';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$datos['footer'] = $this->load->view('footer',$datosHeader,true);
		$this->load->view('admin/add_seanson',$datos);
	}
}
