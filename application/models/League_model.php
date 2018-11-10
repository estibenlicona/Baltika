<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class League_model extends CI_Model {

  public function addLeague($data)
  {
    $teams = $data['teams'];
    $nombre = $data['nombre'];
    $torneo = $data['tournament'];
    $seanson = $data['seanson'];

    $this->db->query("INSERT INTO league(nombre,torneo,seanson,created) VALUES('$nombre',$torneo,$seanson,Date_format(now(),'%Y-%m-%d %h:%i'))");
    $insert_id = $this->db->insert_id();
    for ($i=0; $i < count($teams); $i++) {
      $this->db->query("INSERT INTO league_teams(league,team) VALUES($insert_id,$teams[$i])");
    }
    $this->db->query("INSERT INTO games(torneo, seanson, league, home, away) SELECT @torneo:=$torneo torneo, @seanson:=$seanson seanson, @league:=$insert_id league, l.team home, v.team away FROM league_teams v CROSS JOIN league_teams l ON l.league = $insert_id AND v.league = $insert_id AND l.id <> v.id ORDER BY RAND()");
  }
  public function getLeagues()
  {
    $datos = $this->db->query("SELECT league.id l_id, league.nombre league, league.created created, torneo.id t_id , torneo.nombre torneo, seanson.id s_id, seanson.nombre seanson,
      (SELECT COUNT(team) FROM league_teams WHERE league = league.id) teams,
      (SELECT COUNT(id) FROM games WHERE league = league.id AND played = 0) games,
      (SELECT COUNT(id) FROM games WHERE league = league.id AND played = 1) games_p
      FROM league, torneo, seanson WHERE league.torneo = torneo.id AND league.seanson = seanson.id AND league.estado = 1");
    return $datos->result();
  }

}
