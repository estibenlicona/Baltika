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
	}
  public function index(){
    $datosHeader['title'] = 'Leagues';
    $this->load->view("header",$datosHeader);
    $this->load->view('menu');

    //$data  = array('seansons' => $this->Seanson_model->getSeansons());
    //$this->load->view('seanson',$data);
    $datos = [
      'seansons' => $this->Seanson_model->getSeansons(),
      'tournaments' => $this->Tournament_model->getTournament()
    ];
    $this->load->view('league',$datos);
  }
}
