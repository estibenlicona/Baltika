<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function index()
	{
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Home';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$this->load->view('home',$datos);
	}
}
