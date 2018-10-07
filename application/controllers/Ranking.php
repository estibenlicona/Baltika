<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ranking extends CI_Controller {

	public function index()
	{
		$this->load->view('ranking/home');
	}
}
