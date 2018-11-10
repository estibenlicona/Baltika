<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class League extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Seanson_model");
		$this->load->model("Tournament_model");
		$this->load->model("Team_model");
		$this->load->model("League_model");
	}
  public function index(){
    $datosHeader['title'] = 'Leagues';
    $this->load->view("header",$datosHeader);
    $this->load->view('menu');
    $datos = [
      'seansons' => $this->Seanson_model->getSeansons(),
      'tournaments' => $this->Tournament_model->getTournament(),
			'teams' => $this->Team_model->getTeams(),
			'leagues' => $this->League_model->getLeagues()
    ];
    $this->load->view('league',$datos);
  }
	public function add()
	{
		$datos = [
			'nombre' => $this->input->post('nombre'),
			'tournament' => $this->input->post('tournament'),
			'seanson' => $this->input->post('seanson'),
			'teams' => $_POST['teams']
		];

		$this->League_model->addLeague($datos);
		redirect(base_url('league'), 'location');
	}
}
