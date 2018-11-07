<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class League_model extends CI_Model {
  public function save($data){
		return $this->db->insert("league",$data);
	}
  public function getLeagues(){
    $resultado = $this->db->get("league");
    return $resultado->result();
  }
  public function editLeague($data){
    $id = $data['id'];
    $this->db->where("id",$id);
		return $this->db->update("league",$data);
  }
  public function updateStateLeague($id){
    $this->db->query("UPDATE league SET estado = 0");
    $this->db->query("UPDATE league SET estado = 1 WHERE id = $id");
  }
}
  /*
  public function getClientes(){
    $this->db->select("c.*,tc.nombre as tipocliente, td.nombre as tipodocumento");
    $this->db->from("clientes c");
    $this->db->join("tipo_cliente tc", "c.tipo_cliente_id = tc.id");
    $this->db->join("tipo_documento td", "c.tipo_documento_id = td.id");
    $this->db->where("c.estado","1");
    $resultados = $this->db->get();
    return $resultados->result();
  }

  public function getCliente($id){
    $this->db->where("id",$id);
    $resultado = $this->db->get("clientes");
    return $resultado->row();

  }
  public function save($data){
    return $this->db->insert("clientes",$data);
  }
  public function update($id,$data){
    $this->db->where("id",$id);
    return $this->db->update("clientes",$data);
  }

  public function getTipoClientes(){
    $resultados = $this->db->get("tipo_cliente");
    return $resultados->result();
  }

  public function getTipoDocumentos(){
    $resultados = $this->db->get("tipo_documento");
    return $resultados->result();
  }
  */
