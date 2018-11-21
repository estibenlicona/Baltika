<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paises extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
    $this->load->helper('url');
		$this->load->model("Paises_model");
		if (!$this->session->has_userdata('usuario')) {
			redirect(base_url('login'), 'location');
		}
	}
  public function get()
  {
    header("Content-type:application/json");
    $datos = $this->Paises_model->getPaises();
    echo json_encode($datos);
  }
}
