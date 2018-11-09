<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament_model extends CI_Model {
  public function save($data){
		return $this->db->insert("torneo",$data);
	}
  public function getTournament(){
    $resultado = $this->db->query("SELECT * FROM torneo WHERE estado = 1");
    return $resultado->result();
  }
  public function editLeague($data){
    $id = $data['id'];
    $this->db->where("id",$id);
		return $this->db->update("torneo",$data);
  }
  public function deleteTournament($id){
    $this->db->query("UPDATE torneo SET estado = 0 WHERE id = $id");
  }
}
