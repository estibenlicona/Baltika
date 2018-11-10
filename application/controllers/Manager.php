<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Seanson_model");
		$this->load->model("Manager_model");
	}
  public function index(){
    $datosHeader['title'] = 'Managers';
    $this->load->view("header",$datosHeader);
    $this->load->view('menu');
		$datos = [
			'managers' => $this->Manager_model->getManagers(),
			'paises' => $this->Manager_model->getPaises()
		];
    $this->load->view('manager',$datos);
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
