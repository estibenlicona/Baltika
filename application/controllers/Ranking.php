<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ranking extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
    $this->load->library('upload');
    $this->load->model("Ranking_model");
  }
  public function get($league){
    $datosHeader['title'] = 'Ranking League';
    $datos_session = ['usuario' => $this->session->userdata('usuario')];
    $datos = [
      'id' => $league,
      'ranking' => $this->Ranking_model->getRanking($league)
    ];
    $this->load->view("header",$datosHeader);
    $this->load->view('nav',$datos_session);
    $this->load->view('menu');
    $this->load->view('ranking',$datos);
    $this->load->view('footer');
  }
}
?>
