<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player_model extends CI_Model {
  public function getPosiciones(){
    $query = $this->db->query("SELECT * FROM posiciones");
    return $query->result();
  }
  public function valideNombre($nombre)
  {
    $query = $this->db->query("SELECT nombre FROM jugadores WHERE nombre = '$nombre' AND jugadores.estado != 2");
    if ($query->num_rows() > 0){
      return $query->row();
    }
  }
  public function add($data)
  {
    $this->db->insert('jugadores', $data);
  }
  public function getPlayersLibres()
  {
    $query = $this->db->query("SELECT jugadores.* FROM jugadores_equipos RIGHT JOIN jugadores ON jugadores_equipos.jugador = jugadores.id WHERE jugadores_equipos.id IS NULL AND jugadores.estado != 2");
    return $query->result();
  }
  public function getPlayersTeam($id)
  {
    $query = $this->db->query("SELECT jugadores.id, jugadores.nombre, jugadores.edad, jugadores.foto, jugadores.estado, paises.id id_pais, paises.nombre pais, posiciones.id id_pos, posiciones.clave pos_clave, posiciones.descripcion pos_descripcion FROM jugadores_equipos INNER JOIN jugadores ON jugadores_equipos.jugador = jugadores.id
                              INNER JOIN posiciones ON jugadores.posicion = posiciones.id
                              INNER JOIN paises ON jugadores.pais = paises.id
                              WHERE jugadores_equipos.equipo = $id AND jugadores.estado != 2");
    return $query->result();
  }
  public function getPlayers()
  {
    $query = $this->db->query("SELECT jugadores.id, jugadores.nombre, jugadores.edad, jugadores.foto, jugadores.estado, paises.id id_pais, paises.nombre pais, paises.foto p_foto, posiciones.id id_pos, posiciones.clave pos_clave, posiciones.descripcion pos_descripcion FROM jugadores INNER JOIN posiciones ON jugadores.posicion = posiciones.id
                               INNER JOIN paises ON jugadores.pais = paises.id AND jugadores.estado != 2 LIMIT 15");
    return $query->result();
  }
  public function get()
  {
    $query = $this->db->query("SELECT jugadores.id, jugadores.nombre, jugadores.edad, jugadores.foto, jugadores.estado, paises.id id_pais, paises.nombre pais, paises.foto p_foto, posiciones.id id_pos, posiciones.clave pos_clave, posiciones.descripcion pos_descripcion FROM jugadores INNER JOIN posiciones ON jugadores.posicion = posiciones.id
                               INNER JOIN paises ON jugadores.pais = paises.id AND jugadores.estado != 2");
    return $query->result();
  }
  public function getLike($nombre)
  {
    $query = $this->db->query("SELECT j.id, j.nombre, j.edad, j.foto, j.estado, pa.id id_pais, pa.nombre pais, pa.foto p_foto, pos.id id_pos, pos.clave pos_clave, pos.descripcion pos_descripcion
      FROM jugadores j INNER JOIN posiciones pos ON j.posicion = pos.id INNER JOIN paises pa ON j.pais = pa.id
      WHERE j.estado != 2 AND CONCAT(j.nombre,' ',j.edad,' ',pa.nombre,' ',pos.clave,' ',pos.descripcion) LIKE '%$nombre%' LIMIT 40");
      if ($query->num_rows() > 0){
        return $query->result();
      }

  }
  public function getPlayer($id)
  {
    $query = $this->db->query("SELECT jugadores.id, jugadores.nombre, jugadores.edad, jugadores.foto, jugadores.estado, paises.id id_pais, paises.nombre pais, posiciones.id id_pos, posiciones.clave pos_clave, posiciones.descripcion pos_descripcion FROM jugadores
                              INNER JOIN posiciones ON jugadores.posicion = posiciones.id
                              INNER JOIN paises ON jugadores.pais = paises.id AND jugadores.estado != 2 AND jugadores.id = $id");
    return $query->result();
  }
  public function addPlayersTeam($player,$team)
  {
    $this->db->query("INSERT INTO jugadores_equipos(jugador, equipo) VALUES ($player,$team)");
  }
  public function deletePlayerTeam($team,$player)
  {
    $this->db->query("DELETE FROM jugadores_equipos WHERE equipo = $team AND jugador = $player");
  }
  public function updateStatus($id,$status)
  {
    $this->db->query("UPDATE jugadores SET estado = $status WHERE id = $id");
  }
  public function getNombre($id)
  {
    $query = $this->db->query("SELECT nombre FROM jugadores WHERE id = $id");
      return $query->row();
  }
  public function updatePlayer($data)
  {
    $this->db->where("id",$data['id']);
    return $this->db->update("jugadores",$data);
  }
  public function getPlayersDetails($team1,$team2)
  {
    $query = $this->db->query("SELECT jugadores.id, jugadores.nombre, jugadores.edad, jugadores.foto, jugadores.estado, paises.id id_pais, paises.nombre pais, posiciones.id id_pos, posiciones.clave pos_clave, posiciones.descripcion pos_descripcion FROM jugadores_equipos INNER JOIN jugadores ON jugadores_equipos.jugador = jugadores.id
                INNER JOIN posiciones ON jugadores.posicion = posiciones.id
                INNER JOIN paises ON jugadores.pais = paises.id
                WHERE jugadores.estado != 2 AND (jugadores_equipos.equipo = $team2 OR jugadores_equipos.equipo = $team1)");
      return $query->result();

  }
}
