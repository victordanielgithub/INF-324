<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Economo_model extends CI_Model {

	//verificar usuario
	public function getEconomos(){
		//$this->db->where("estado","1");
		 $this->db->select('ci_eco ,grado_e,apellido_e,nombre_e,estado_e');
    	$this->db->from('economo');
    	//$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getEconomo($ci_eco){
		 $this->db->select('ci_eco ,grado_e,apellido_e,nombre_e,estado_e');
		$this->db->from('economo');
		$this->db->where("ci_eco",$ci_eco);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("economo",$data);
	}
	//actualizar usuario
	public function update($ci_eco,$data){
		$this->db->where("ci_eco",$ci_eco);
		return $this->db->update("economo",$data);
	}
}
