<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {

  public function addManager($nombre,$nacionalidad)
  {
    $this->db->query("INSERT INTO managers(nombre,nacionalidad,date) VALUES('$nombre','$nacionalidad',Date_format(now(),'%Y-%m-%d %h:%i'))");
  }
  public function getPaises()
  {
    $datos =  $this->db->query("SELECT * FROM paises ORDER BY FIELD(nombre,'Nicaragua','Venezuela','Argentina','Mexico','Colombia') DESC");
    return $datos->result();
  }
  public function getManagers()
  {
    $datos =  $this->db->query("SELECT m.id id_manager, m.nombre manager, m.date created, p.id id_pais, p.nombre nacionalidad FROM managers m, paises p WHERE p.id = m.nacionalidad AND m.estado = 1");
    return $datos->result();
  }
  public function deleteManager($id)
  {
    $this->db->query("UPDATE managers SET estado = 0 WHERE id = $id");
  }
  public function editManager($id,$nombre,$nacionalidad){
    $this->db->query("UPDATE managers SET nombre = '$nombre', nacionalidad = '$nacionalidad' WHERE id = $id");
  }
}
