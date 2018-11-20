<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Seanson_model");
		$this->load->model("Manager_model");
	}
  public function index(){
    $datosHeader['title'] = 'Managers';
		$datos_session = ['usuario' => $this->session->userdata('usuario')];
		$datos = [
			'managers' => $this->Manager_model->getManagers(),
			'paises' => $this->Manager_model->getPaises()
		];
		$this->load->view("header",$datosHeader);
		$this->load->view('nav',$datos_session);
		$this->load->view('menu');
    $this->load->view('manager',$datos);
		$this->load->view('footer');
  }

	public function add()
	{
		$nombre = $this->input->post('nombre');
		$nacionalidad = $this->input->post('nacionalidad');
		$this->Manager_model->addManager($nombre,$nacionalidad);
		redirect(base_url('manager'), 'location');
	}
	public function delete($id)
	{
		$this->Manager_model->deleteManager($id);
		redirect(base_url('manager'), 'location');
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$nacionalidad = $this->input->post('nacionalidad');
		$this->Manager_model->editManager($id,$nombre,$nacionalidad);
		redirect(base_url('manager'), 'location');
	}
}
