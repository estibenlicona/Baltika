<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

  public function getNombre($id)
  {
    $query = $this->db->query("SELECT nombre FROM teams WHERE id = $id");
      return $query->row();
  }
  public function get($id)
  {
    $query = $this->db->query("SELECT * FROM teams WHERE id = $id");
    if ($query->num_rows() > 0){
      return $query->row();
    }
  }
  public function valideNombre($nombre)
  {
    $query = $this->db->query("SELECT nombre FROM teams WHERE nombre = '$nombre'");
    if ($query->num_rows() > 0){
      return $query->row();
    }
  }
  public function getNull($id)
  {
    $data = $this->db->query("SELECT teams.* FROM usuarios RIGHT JOIN teams ON usuarios.team = teams.id WHERE (usuarios.team IS NULL OR usuarios.team = teams.id AND usuarios.id = $id OR teams.id = 0) AND teams.estado != 2");
    return $data->result();
  }

  public function addTeam($nombre,$foto)
  {
    $this->db->query("INSERT INTO teams(nombre,foto,created) VALUES('$nombre','$foto',Date_format(now(),'%Y-%m-%d %h:%i'))");
  }
  public function getTeams()
  {
    $data = $this->db->query("SELECT teams.*, usuarios.id id_manager, usuarios.username manager
      FROM usuarios RIGHT JOIN teams ON usuarios.team = teams.id WHERE usuarios.team IS NULL AND teams.estado != 2 OR usuarios.team = teams.id AND teams.id != 0");
    return $data->result();
  }
  public function getTeamsLeague($league)
  {
    $data = $this->db->query("SELECT teams.* FROM league_teams INNER JOIN teams ON league_teams.team = teams.id
                              WHERE league_teams.league = $league");
    return $data->result();
  }
  public function editTeam($data){
    $this->db->where("id",$data['id']);
    return $this->db->update("teams",$data);
  }
  public function updateStatus($id,$status)
  {
    $this->db->query("UPDATE teams SET estado = $status WHERE id = $id");
  }
}
