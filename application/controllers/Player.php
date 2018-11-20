<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Player extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model("Seanson_model");
		$this->load->model("Manager_model");
		$this->load->model("Player_model");
    $this->load->model("Tournament_model");
    $this->load->model("Team_model");
	}

  public function index()
  {
    $datos['players'] = $this->Player_model->getPlayers();
    $this->load->view('header',array('title' => 'Players'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('players',$datos);

  }
	public function ajaxGetPlayers()
	{
		header("Content-type:application/json");
		$players = $this->Player_model->getPlayers();
		echo $json = json_encode($players);
		//echo json_encode($json);
	}
  public function getPlayer($id2='')
  {
    $id = $this->input->post('id');
    if ($id=='') {
      if ($id2=='') {
        redirect(base_url('player'),'location');
        exit;
      }else {
        $id = $id2;
      }
    }

    $datos['player'] = $this->Player_model->getPlayer($id);
    $datos['players'] = $this->Player_model->getPlayers();
    $this->load->view('header',array('title' => 'Player'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('player',$datos);

  }
  public function reg_pl_t_view($id)
  {
    $this->load->view('header',array('title' => 'Players'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('register_team_players');
  }

  public function team_players_view($id)
  {
    $datos['id'] = $id;
    $datos['team'] = $this->Team_model->get($id);
    $datos['playersLibres'] = $this->Player_model->getPlayersLibres();
    $datos['players'] = $this->Player_model->getPlayersTeam($id);
    $datos['tournaments'] = $this->Tournament_model->getTournament();
    $datos['seansons'] = $this->Seanson_model->getSeansons();
    $this->load->view("header",array('title' => 'Team Playes'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('forms/team_players',$datos);
  }
  public function add_player_team($team)
  {
    $players = $this->input->post('players');

    foreach ($players as $p) {
      $this->Player_model->addPlayersTeam($p,$team);
    }
    redirect(base_url('player/team_players_view/'.$team),'location');
  }
  public function delete_player_team($team,$player)
  {
    $this->Player_model->deletePlayerTeam($team,$player);
    redirect(base_url('player/team_players_view/'.$team),'location');
  }
  public function create_view()
  {
    $datos['posiciones'] = $this->Player_model->getPosiciones();
    $datos['paises'] = $this->Manager_model->getPaises();
    $this->load->view('header',array('title' => 'Create Player'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('forms/register_player',$datos);
  }
  public function create()
  {
    $nombre = $this->input->post('nombre');
    $foto = $this->uploadImagen('foto');

    if (!is_null($this->Player_model->valideNombre($nombre)) && $nombre2 !== $nombre) {
      $this->session->set_flashdata('mensaje1', $nombre.' no esta disponible ...');
    }else {
      $data['nombre'] = $nombre;
    }

    if ($foto != 'not_select') {
      if ($foto =='ext_invalid') {
        $this->session->set_flashdata('mensaje2', 'Extención no valida ...');
      }else {
        $data['foto'] = $foto;
      }
    }

    if (!is_null($this->session->flashdata('mensaje1')) || !is_null($this->session->flashdata('mensaje2'))) {
      redirect(base_url('player/create_view'), 'location');
    }else {
      $data['edad'] = $this->input->post('edad');
      $data['pais'] = $this->input->post('pais');
      $data['posicion'] = $this->input->post('posicion');
      $this->Player_model->add($data);
      redirect(base_url('player'), 'location');
    }
  }
  public function edit_view($id)
  {
    $datos['posiciones'] = $this->Player_model->getPosiciones();
    $datos['paises'] = $this->Manager_model->getPaises();
    $datos['player'] = $this->Player_model->getPlayer($id);
    $this->load->view('header',array('title' => 'Edit Player'));
    $this->load->view('nav');
    $this->load->view('menu');
    $this->load->view('forms/edit_player',$datos);
  }
  public function edit($id)
  {
    $nombre = $this->input->post('nombre');
    $foto = $this->uploadImagen('foto');
    $datos = $this->Player_model->getNombre($id);
		$nombre2 = $datos->nombre;

    $data['id'] = $id;
    if (!is_null($this->Player_model->valideNombre($nombre)) && $nombre2 !== $nombre) {
      $this->session->set_flashdata('mensaje1', $nombre.' no esta disponible ...');
    }else {
      $data['nombre'] = $nombre;
    }

    if ($foto != 'not_select') {
      if ($foto =='ext_invalid') {
        $this->session->set_flashdata('mensaje2', 'Extención no valida ...');
      }else {
        $data['foto'] = $foto;
      }
    }

    if (!is_null($this->session->flashdata('mensaje1')) || !is_null($this->session->flashdata('mensaje2'))) {
      redirect(base_url('player/edit_view/'.$id), 'location');
    }else {

      $data['edad'] = $this->input->post('edad');
      $data['pais'] = $this->input->post('pais');
      $data['posicion'] = $this->input->post('posicion');
      $this->Player_model->updatePlayer($data);
      redirect(base_url('player'), 'location');

    }
  }
  public function uploadImagen($name_imagen){
    $config = array(
      'upload_path' => './lib/logos',
      'allowed_types' => 'gif|jpg|png',
      'encrypt_name' => true
    );
    $this->upload->initialize($config);
    $this->upload->do_upload($name_imagen);
    $this->upload->do_upload($name_imagen);

    if ($this->upload->data('file_size') != 0) {
      if ($this->upload->data('file_ext') != '.png' || $this->upload->data('file_ext') == '.PNG') {
        return 'ext_invalid';
        exit;
      }
    }else {
      return 'not_select';
      exit;
    }
    return $this->upload->data('file_name');
  }
  public function status($id,$status,$metodo='')
  {

    $this->Player_model->updateStatus($id,$status);
    if ($metodo=='one') {
      redirect(base_url('player/getPlayer/'.$id),'location');
    }else {
      redirect(base_url('player'), 'location');
    }

  }
}
