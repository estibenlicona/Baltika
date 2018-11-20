<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Games extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Games_model");
    $this->load->model("Seanson_model");
    $this->load->model("Tournament_model");
    $this->load->model("Team_model");
    $this->load->model("League_model");
    $this->load->model("Player_model");
	}

	public function details_view($game)
	{
		$datos['game'] = $this->Games_model->getGameDetail($game);
		$datos['details'] = $this->Games_model->getDetalleEvento($game);
		$datos['eventos'] = $this->Games_model->getEventos();
		if (isset($datos['details'][0]->total_goles)) {
			$total_goles = $datos['details'][0]->total_goles;
		}else {
			$total_goles = 0;
		}
		$this->session->set_userdata('max_event',$datos['game']->g_total-$total_goles);

		$datos['players'] = $this->Player_model->getPlayersDetails($datos['game']->id_home,$datos['game']->id_away);
		$this->load->view("header",array('title' => 'Game Details'));
		$this->load->view('nav');
		$this->load->view('menu');
		$this->load->view('forms/detail_game',$datos);

	}
	public function add_detail($game)
	{
		$player = $this->input->post('player');
		$evento = $this->input->post('evento');
		$cantidad = $this->input->post('cant_event');
		$this->Games_model->setEventos($game,$player,$evento,$cantidad);
		redirect(base_url('games/details_view/'.$game), 'location');
	}
	public function delete_detail($game,$jugador,$evento)
	{
		$this->Games_model->deleteDetailPlayer($game,$jugador,$evento);
		redirect(base_url('games/details_view/'.$game), 'location');
	}

  public function get($league){
    $datosHeader['title'] = 'Games';
    $this->load->view("header",$datosHeader);
    $datos = [
			'id' => $league,
      'seansons' => $this->Seanson_model->getSeansons(),
      'tournaments' => $this->Tournament_model->getTournament(),
      'teams' => $this->Team_model->getTeamsLeague($league),
      'leagues' => $this->League_model->getLeagues(),
      'games' => $this->Games_model->getGames($league)
    ];
		$datos_session = ['usuario' => $this->session->userdata('usuario')];
		$this->load->view('nav',$datos_session);
    $this->load->view('menu');
		$this->load->view('games',$datos);
		$this->load->view('footer');
  }

  public function getOne($league,$team){

    $datosHeader['title'] = 'Games';
    $this->load->view("header",$datosHeader);
    $datos = [
			'team' => $team,
			'id' => $league,
      'seansons' => $this->Seanson_model->getSeansons(),
      'tournaments' => $this->Tournament_model->getTournament(),
      'teams' => $this->Team_model->getTeamsLeague($league),
      'leagues' => $this->League_model->getLeagues(),
      'games' => $this->Games_model->getGameOneModel($league,$team)
    ];
    $this->load->view('menu');
    $this->load->view('gamesOne',$datos);

  }
  public function getTwo($league,$team1,$team2){

    $datosHeader['title'] = 'Games';
    $this->load->view("header",$datosHeader);
    $datos = [
			'id' => $league,
      'seansons' => $this->Seanson_model->getSeansons(),
      'tournaments' => $this->Tournament_model->getTournament(),
      'teams' => $this->Team_model->getTeamsLeague($league),
      'leagues' => $this->League_model->getLeagues(),
      'games' => $this->Games_model->getGameTwoModel($league,$team1,$team2)
    ];
    $this->load->view('menu');
    $this->load->view('gamesTwo',$datos);
  }
	public function played($home,$away,$league,$played)
	{
		$date = "Date_format(now(),'%Y-%m-%d %h:%i')";
		if ($played == 0) {
			$date = "''";
		}
		$this->Games_model->played($home,$away,$league,$played,$date);
		redirect(base_url('games/get/'.$league), 'location');
	}
	public function saved($team1,$team2,$league,$metodo='false')
	{
		$g_home = $this->input->post('g_home');
		$g_away = $this->input->post('g_away');
		if ($g_home=='') {
			$g_home=0;
		}
		if ($g_away=='') {
			$g_away=0;
		}
		$this->Games_model->savedGame($team1,$team2,$g_home,$g_away,$league);
		if ($metodo=='false') {
			redirect(base_url('games/get/'.$league), 'location');
		}
		if ($metodo=='two') {
			redirect(base_url('games/getTwo/'.$league.'/'.$team1.'/'.$team2), 'location');
		}
		if ($metodo!='false' && $metodo!='two') {
			redirect(base_url('games/getOne/'.$league.'/'.$metodo), 'location');
		}
	}
	public function playedOne($home,$away,$league,$played,$team)
	{
		$date = "Date_format(now(),'%Y-%m-%d %h:%i')";
		if ($played == 0) {
			$date = "''";
		}
		$this->Games_model->played($home,$away,$league,$played,$date);
		redirect(base_url('games/getOne/'.$league.'/'.$team), 'location');
	}
	public function playedTwo($home,$away,$league,$played)
	{
		$date = "Date_format(now(),'%Y-%m-%d %h:%i')";
		if ($played == 0) {
			$date = "''";
		}
		$this->Games_model->played($home,$away,$league,$played,$date);

		redirect(base_url('games/getTwo/'.$league.'/'.$home.'/'.$away), 'location');
	}


	public function getSeach($league)
	{
		$home = $this->input->post('teams[0]');
		$away = $this->input->post('teams[1]');

		if ($away == '') {
			redirect(base_url('games/getOne/'.$league.'/'.$home), 'location');
		}else {
			redirect(base_url('games/getTwo/'.$league.'/'.$home.'/'.$away), 'location');
		}

	}

}
