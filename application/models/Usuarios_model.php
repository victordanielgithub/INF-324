<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($username, $password){
		$this->db->where("username", $username);
		$this->db->where("password", $password);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();  	
		}
		else{
			return false;
		}
	}
	//verificar usuario
	public function getUsuarios(){
		//$this->db->where("estado","1");
		 $this->db->select('id,ci_pol ,grado,apellido,nombre,email,username,password,estado,rol_id');
    	$this->db->from('usuarios');
    	$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	//obtener usuario x
	public function getUsuario($id){
		 $this->db->select('id,ci_pol ,grado,apellido,nombre,email,username,password,estado,rol_id');
		$this->db->from('usuarios');
		$this->db->where("ci_pol",$id);
		$resultado = $this->db->get();
		return $resultado->row();

	}
	//añadir usuario
	public function save($data){
		return $this->db->insert("usuarios",$data);
	}
	//actualizar usuario
	public function update($id,$data){
		$this->db->where("ci_pol",$id);
		return $this->db->update("usuarios",$data);
	}
}
