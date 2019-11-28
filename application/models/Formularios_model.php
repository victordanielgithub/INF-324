<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formularios_model extends CI_Model {

	public function getPedidos(){
		 $this->db->select('id_fp, mes,fecha, motivo, destino');
		$this->db->from("form_pedido");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getPedido($id){
		$this->db->where("id_fp",$id);
		$resultado = $this->db->get("form_pedido");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("form_pedido",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("productos",$data);
	}
	///////////////////////////FORMULACIO PEDIDO///////////////////////////////
	public function get_list_form_Pedidos($id_fp){
		 $this->db->select('p.id,p.id_fp, p.cantidad,p.unidad,pr.descripcion,p.observacion');
		$this->db->from("pedido p, producto pr");
		$this->db->where("p.id_fp",$id_fp);
		$where="p.id_producto=pr.id_producto";
		$this->db->Where($where);
		$resultados = $this->db->get();
		return $resultados->result();
	}
		
	public function get_list_Pedido($id){
		$this->db->where("id_fp",$id);
		$resultado = $this->db->get("pedido");
		return $resultado->row();
	}
	public function save_pedido($data){
		return $this->db->insert("pedido",$data);
	}

	public function update_pedido($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("productos",$data);
	}

	////////////////////FORMULARIO DE ENTREGA AL ECONOMO////////////////////////////
	public function get_actas_entrega_eco(){
		 $this->db->select('id_acta,fecha,id_pedido');
		$this->db->from("acta_entrega");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function get_acta_entrega_eco($id){
		$this->db->where("id_acta",$id);
		$resultado = $this->db->get("acta_entrega");
		return $resultado->row();
	}
	public function save_acta_entrega_eco($data){
		return $this->db->insert("acta_entrega",$data);
	}
	////////////////////FORMULARIO DE RECEPCION DE PRODUCTOS////////////////////////////
	public function get_actas_recepcion_prod(){
		 $this->db->select('id_acta,fecha,id_pedido');
		$this->db->from("acta_recepcion");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function get_acta_recepcion_prod($id){
		$this->db->where("id_acta",$id);
		$resultado = $this->db->get("acta_recepcion");
		return $resultado->row();
	}
	public function save_acta_recepcion_prod($data){
		return $this->db->insert("acta_recepcion",$data);
	}
	/////////////////FORMULARIO DE ACTA DE ENTREGA DEL PRODUCTO A COCINA///////////////
	public function get_actas_entrega_prod_cocina(){
		 $this->db->select('id_acta,fecha,id_pedido');
		$this->db->from("acta_entrega_cocina");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function get_acta_entrega_prod_cocina($id){
		$this->db->where("id_acta",$id);
		$resultado = $this->db->get("acta_entrega_cocina");
		return $resultado->row();
	}
	public function save_acta_entrega_prod_cocina($data){
		return $this->db->insert("acta_entrega_cocina",$data);
	}

}