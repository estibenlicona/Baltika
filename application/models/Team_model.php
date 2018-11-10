<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

  public function addTeam($nombre,$manager)
  {
    $this->db->query("INSERT INTO teams(nombre,manager,created) VALUES('$nombre',$manager,Date_format(now(),'%Y-%m-%d %h:%i'))");
  }
  public function getTeams()
  {
    $data = $this->db->query("SELECT teams.id t_id, teams.nombre team, created, managers.id m_id, managers.nombre manager FROM teams,managers WHERE teams.manager = managers.id AND teams.estado = 1");
    return $data->result();
  }
  public function editTeam($id,$nombre,$manager){
    $this->db->query("UPDATE teams SET nombre = '$nombre', manager = $manager WHERE id = $id");
  }
  public function deleteTeam($id)
  {
    $this->db->query("UPDATE teams SET estado = 0 WHERE id = $id");
  }
}
