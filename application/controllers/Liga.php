<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Liga extends CI_Controller {

  public function index()
	{
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Gestor de Ligas';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$this->load->view('liga/listado',$datos);
  }
}
