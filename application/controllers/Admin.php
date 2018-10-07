<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function index()
	{
		$datos['url_base'] = base_url();
		$this->load->view('admin/crearTorneo',$datos);
	}
}
