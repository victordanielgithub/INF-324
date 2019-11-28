<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {

	//verificar usuario
	public function getAdministradors(){
		//$this->db->where("estado","1");
		 $this->db->select('ci_adm,grado_a,apellido_a,nombre_a,estado_a');
    	$this->db->from('administrador');
    	//$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getAdministrador($ci_adm){
		 $this->db->select('ci_adm,grado_a,apellido_a,nombre_a,estado_a');
		$this->db->from('administrador');
		$this->db->where("ci_adm",$ci_adm);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("administrador",$data);
	}
	//actualizar usuario
	public function update($ci_adm,$data){
		$this->db->where("ci_adm",$ci_adm);
		return $this->db->update("administrador",$data);
	}
}
