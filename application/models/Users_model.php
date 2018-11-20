<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  public function updateUser($data)
  {
    $this->db->where("id",$data['id']);
    return $this->db->update("usuarios",$data);
  }
  public function get($id)
  {
    $query = $this->db->query("SELECT usuarios.id,usuarios.username, usuarios.password, usuarios.foto,usuarios.date_create,usuarios.estado,usuarios.rol,
                              paises.id id_pais,paises.nombre pais, usuarios.team id_team,
                              (SELECT nombre FROM teams WHERE id = usuarios.team) nombre_team
                              FROM usuarios,paises WHERE usuarios.pais = paises.id
                              AND usuarios.estado != 2 AND usuarios.id = $id");
    return $query->result();
  }
  public function set($username,$password,$pais,$foto,$estado=0)
  {
    $datos = $this->db->query("INSERT INTO usuarios(username, password, pais, foto, estado,date_create) VALUES ('$username','$password',$pais,'$foto',$estado,Date_format(now(),'%Y-%m-%d %h:%i'))");
  }
  public function getUsers()
  {
    $query = $this->db->query("SELECT usuarios.id,usuarios.username, usuarios.password, usuarios.foto,usuarios.date_create,usuarios.estado,usuarios.rol,
        paises.id id_pais,paises.nombre pais, usuarios.team id_team,
        (SELECT nombre FROM teams WHERE id = usuarios.team) nombre_team
        FROM usuarios,paises WHERE usuarios.pais = paises.id
        AND usuarios.estado != 2");
    return $query->result();
  }
  public function updateStatus($id,$status)
  {
    $this->db->query("UPDATE usuarios SET estado = $status WHERE id = $id");
  }
}
