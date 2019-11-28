<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model {


	//verificar usuario
	public function getProveedors(){
		//$this->db->where("estado","1");
		 $this->db->select('ci_prov,apellido,nombre,telefono,estado');
    	$this->db->from('proveedor');
    	//$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getProveedor($ci_prov){
		 $this->db->select('ci_prov,apellido,nombre,telefono,estado');
		$this->db->from('proveedor');
		$this->db->where("ci_prov",$ci_prov);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("proveedor",$data);
	}
	//actualizar usuario
	public function update($ci_prov,$data){
		$this->db->where("ci_prov",$ci_prov);
		return $this->db->update("proveedor",$data);
	}
}
