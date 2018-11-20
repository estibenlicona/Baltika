<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
  public function get($username,$pass)
  {
    $query = $this->db->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$pass'");
    if ($query->num_rows() > 0){
      return $query->row();
    }
  }

}
