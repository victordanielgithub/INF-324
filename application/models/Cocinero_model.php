<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cocinero_model extends CI_Model {

	//verificar usuario
	public function getCocineros(){
		//$this->db->where("estado","1");
		$this->db->select('ci_coci, apellido, nombre, cargo, estado');
    	$this->db->from('cocinero');
    	//$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getCocinero($ci_coci){
		$this->db->select('ci_coci, apellido, nombre, cargo, estado');
		$this->db->from('cocinero');
		$this->db->where("ci_coci",$ci_coci);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("cocinero",$data);
	}
	//actualizar usuario
	public function update($ci_coci,$data){
		$this->db->where("ci_coci",$ci_coci);
		return $this->db->update("cocinero",$data);
	}
}
