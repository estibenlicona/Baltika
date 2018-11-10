<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Team_model");
		$this->load->model("Manager_model");
	}

  public function index(){
		$datosHeader['title'] = 'Teams';
		$this->load->view("header",$datosHeader);
		$this->load->view('menu');
		$data  = [
			'managers' => $this->Manager_model->getManagers(),
			'teams' => $this->Team_model->getTeams()
		];
		$this->load->view('team',$data);
	}
	public function add()
	{
		$nombre = $this->input->post('nombre');
		$manager = $this->input->post('manager');
		$this->Team_model->addTeam($nombre,$manager);
		redirect(base_url('team'), 'location');
	}
	public function edit()
	{
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$manager = $this->input->post('manager');
		$this->Team_model->editTeam($id,$nombre,$manager);
		redirect(base_url('team'), 'location');
	}
	public function delete($id)
	{
		$this->Team_model->deleteTeam($id);
		redirect(base_url('team'), 'location');
	}

}
