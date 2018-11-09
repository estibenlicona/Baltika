<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seanson_model extends CI_Model {
  public function getSeansons(){
    $resultado = $this->db->query("SELECT * FROM seanson WHERE estado = 1");
    return $resultado->result();
  }
  public function addSeanson($nombre)
  {
    echo $nombre;
    $this->db->query("INSERT INTO seanson(nombre,date) VALUES('$nombre',now())");
  }
  public function deleteSeanson($id){
    $this->db->query("UPDATE seanson SET estado = 0 WHERE id = $id");
  }
  public function editSeanson($id,$nombre){
    $this->db->query("UPDATE seanson SET nombre = '$nombre' WHERE id = $id");
  }
}
 ?>
