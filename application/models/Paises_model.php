<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paises_model extends CI_Model {
  public function getPaises()
  {
    $query = $this->db->query("SELECT * FROM paises");
    return $query->result();
  }
}
