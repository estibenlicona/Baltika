<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Torneo extends CI_Controller {
	public function nuevo()
	{
    $datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Home';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$datos['footer'] = $this->load->view('footer',$datosHeader,true);
		$this->load->view('torneo/nuevo',$datos);
	}
}
