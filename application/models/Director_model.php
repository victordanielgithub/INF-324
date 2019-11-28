<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director_model extends CI_Model {

	//verificar usuario
	public function getDirectors(){
		//$this->db->where("estado","1");
		 $this->db->select('ci_direc ,grado_d,apellido_d,nombre_d,estado_d,');
    	$this->db->from('director');
    	//$this->db->where("estado_d","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getDirector($ci_direc){
		 $this->db->select('ci_direc ,grado_d,apellido_d,nombre_d,estado_d,');
		$this->db->from('director');
		$this->db->where("ci_direc",$ci_direc);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("director",$data);
	}
	//actualizar usuario
	public function update($ci_direc,$data){
		$this->db->where("ci_direc",$ci_direc);
		return $this->db->update("director",$data);
	}
}
