<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games_model extends CI_Model {

  public function getGameDetail($game)
  {
    $query = $this->db->query("SELECT g.id, g.date_game, g.played, g.league league, th.id id_home, th.foto th_escudo, th.nombre th_nombre, mh.username mh_nombre, g.g_home,
      tv.id id_away, tv.nombre tv_nombre, tv.foto tv_escudo, mv.username mv_nombre, g.g_away,(g.g_home+g.g_away) g_total
      FROM games g INNER JOIN teams th ON g.home = th.id
      INNER JOIN teams tv ON g.away = tv.id
      INNER JOIN usuarios mh ON mh.team = th.id
      INNER JOIN usuarios mv ON mv.team = tv.id
      WHERE g.id = $game");
    return $query->row();
  }

  public function getGames($league)
  {
    $datos = $this->db->query("SELECT g.id, g.date_game, g.played, g.league league, th.id id_home, th.nombre th_nombre, mh.username mh_nombre, g.g_home,
      tv.id id_away, tv.nombre tv_nombre, mv.username mv_nombre, g.g_away
      FROM games g INNER JOIN teams th ON g.home = th.id
      INNER JOIN teams tv ON g.away = tv.id
      INNER JOIN usuarios mh ON mh.team = th.id
      INNER JOIN usuarios mv ON mv.team = tv.id
      WHERE g.league = $league");
    return $datos->result();
  }
  public function getGameOneModel($league,$team)
  {
    $datos = $this->db->query("SELECT g.id, g.date_game, g.played, g.league league, th.id id_home, th.nombre th_nombre, mh.username mh_nombre, g.g_home,
      tv.id id_away, tv.nombre tv_nombre, mv.username mv_nombre, g.g_away
        FROM games g INNER JOIN teams th ON g.home = th.id
        INNER JOIN teams tv ON g.away = tv.id
        INNER JOIN usuarios mh ON mh.team = th.id
        INNER JOIN usuarios mv ON mv.team = tv.id
        WHERE  (g.league = $league AND th.id = $team) OR (g.league = $league AND tv.id = $team)");

    return $datos->result();

  }
  public function getGameTwoModel($league,$team1,$team2)
  {
    $datos = $this->db->query("SELECT g.id, g.date_game, g.played, g.league league, th.id id_home, th.nombre th_nombre, mh.username mh_nombre, g.g_home,
      tv.id id_away, tv.nombre tv_nombre, mv.username mv_nombre, g.g_away
        FROM games g INNER JOIN teams th ON g.home = th.id
        INNER JOIN teams tv ON g.away = tv.id
        INNER JOIN usuarios mh ON mh.team = th.id
        INNER JOIN usuarios mv ON mv.team = tv.id
        WHERE (g.league = $league AND th.id = $team1 AND tv.id = $team2) OR (g.league = $league AND th.id = $team2 AND tv.id = $team1)");
    return $datos->result();
  }

  public function played($home,$away,$league,$played,$date)
  {
    $this->db->query("UPDATE games SET played = $played, date_game = $date WHERE league = $league AND home = $home AND away = $away");
  }
  public function savedGame($team1,$team2,$g_home,$g_away,$league)
  {
    $this->db->query("UPDATE games SET g_home = $g_home, g_away = $g_away WHERE league = $league AND home = $team1 AND away = $team2");
  }
  public function getEventos()
  {
    $query = $this->db->query("SELECT * FROM eventos");
      return $query->result();
  }
  public function setEventos($partido,$jugador,$evento,$cantidad)
  {
    $this->db->query("INSERT INTO eventos_partidos(partido,jugador,evento,cantidad) VALUES ($partido, $jugador,$evento,$cantidad)");
  }
  public function getDetalleEvento($game)
  {
    $query = $this->db->query("SELECT e.id, e.partido, t.id id_equipo, t.nombre n_equipo, t.foto f_equipo, e.jugador id_jugador, j.nombre n_jugador, j.foto f_jugador, ev.id id_evento, ev.nombre n_evento, ev.foto f_evento, SUM(e.cantidad) e_cantidad,
    (SELECT SUM(cantidad) goles FROM eventos_partidos WHERE (evento = 3 OR evento = 4) AND partido = e.partido) total_goles
        FROM eventos_partidos e INNER JOIN games g ON e.partido = g.id
        INNER JOIN eventos ev ON e.evento = ev.id
        INNER JOIN jugadores_equipos je ON e.jugador = je.jugador
        INNER JOIN jugadores j ON je.jugador = j.id
        INNER JOIN teams t ON je.equipo = t.id
        WHERE e.partido = $game GROUP BY e.jugador, e.evento");
    return $query->result();

  }
  public function deleteDetailPlayer($partido,$jugador,$evento)
  {
    $this->db->query("DELETE FROM eventos_partidos WHERE partido = $partido AND jugador = $jugador AND evento = $evento");
  }
}
