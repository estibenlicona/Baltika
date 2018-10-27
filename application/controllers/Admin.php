<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function list_league()
	{
		$datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Leagues';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$this->load->view('admin/list_league',$datos);
	}
	public function add_league()
	{
    $datosHeader['url_base'] = base_url();
		$datosHeader['title'] = 'Add League';
		$datos['header'] = $this->load->view('header',$datosHeader,true);
		$datos['menu'] = $this->load->view('menu',$datosHeader,true);
		$datos['footer'] = $this->load->view('footer',$datosHeader,true);
		$this->load->view('admin/add_league',$datos);
	}
}
