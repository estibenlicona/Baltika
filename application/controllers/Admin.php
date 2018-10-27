<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function torneo()
	{
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Home';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$this->load->view('admin/league',$datos);
	}
}
