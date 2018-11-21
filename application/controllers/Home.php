<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Seanson_model");
		$this->load->model("Tournament_model");
		$this->load->model("Team_model");
		$this->load->model("League_model");
		if (!$this->session->has_userdata('usuario')) {
			redirect(base_url('login'), 'location');
		}
	}
	public function index()
	{

			$datosHeader['title'] = 'Home';
			$this->load->view("header",$datosHeader);
			$this->load->view('nav');
			$this->load->view('menu');
			$this->load->view('home');
			$this->load->view('footer');
	}
}
