<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking_model extends CI_Model {
  public function getRanking($league)
  {
    $datos = $this->db->query("SELECT teams.nombre team, teams.foto escudo, usuarios.username manager,
      templ.tl id_team,
      (templ.pl+tempv.pv) partidos,
      (templ.pjl+tempv.pjv) p_jugados,
      (templ.gfl+tempv.gfv) g_favor,
      (templ.gcl+tempv.gcv) g_contra,
      ((templ.gfl+tempv.gfv) - (templ.gcl+tempv.gcv)) g_diferencia,
      (templ.pgl+tempv.pgv) p_ganados,
      (templ.pel+tempv.pev) p_empatados,
      (templ.ppl+tempv.ppv) p_perdidos,
      (templ.ptsl+tempv.ptsv) puntos
      FROM
      (
      SELECT t.id tl, COUNT(g.home) pl, SUM(g.played) pjl,
      SUM(CASE WHEN g.played = 1 THEN g.g_home ELSE 0 END) as gfl,
      SUM(CASE WHEN g.played = 1 THEN g.g_away ELSE 0 END) as gcl,
      SUM(CASE WHEN g.g_home > g.g_away AND g.played = 1 THEN 1 ELSE 0 END) as pgl,
      SUM(CASE WHEN g.g_away = g.g_home AND g.played = 1 THEN 1 ELSE 0 END) as pel,
      SUM(CASE WHEN g.g_home < g.g_away AND g.played = 1 THEN 1 ELSE 0 END) as ppl,
      SUM(CASE WHEN g.g_home > g.g_away AND g.played = 1 THEN 3 ELSE 0 END) as ptsl
      FROM games g INNER JOIN teams t ON t.id = g.home
      WHERE g.league = $league
      GROUP BY t.id
      ) as templ,
      (
      SELECT t.id tv, COUNT(g.away) pv, SUM(g.played) pjv,
      SUM(CASE WHEN g.played = 1 THEN g.g_away ELSE 0 END) as gfv,
      SUM(CASE WHEN g.played = 1 THEN g.g_home ELSE 0 END) as gcv,
      SUM(CASE WHEN g.g_away > g.g_home AND g.played = 1 THEN 1 ELSE 0 END) as pgv,
      SUM(CASE WHEN g.g_home = g.g_away AND g.played = 1 THEN 1 ELSE 0 END) as pev,
      SUM(CASE WHEN g.g_away < g.g_home AND g.played = 1 THEN 1 ELSE 0 END) as ppv,
      SUM(CASE WHEN g.g_away > g.g_home AND g.played = 1 THEN 3 ELSE 0 END) as ptsv
      FROM games g INNER JOIN teams t ON t.id = g.away
      WHERE g.league = $league
      GROUP BY t.id
      ) as tempv,
      teams, usuarios
      WHERE tempv.tv = templ.tl AND teams.id = templ.tl AND usuarios.team = teams.id ORDER BY puntos DESC");
    return $datos->result();
  }
}
