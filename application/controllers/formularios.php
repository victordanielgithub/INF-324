a<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formularios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Formularios_model");
		$this->load->model("Productos_model");
	}

	public function list_pedido()
	{
		$data =array( 
			"fpedidos" => $this->Formularios_model->getPedidos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/list_pedido",$data);
		$this->load->view("layouts/footer");

	}
	public function add_pedido(){
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/add_pedido");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$fecha = $this->input->post("fecha");
		$mes = $this->input->post("mes");
		$motivo = $this->input->post("motivo");
		$destino = $this->input->post("destino");
		
		$data  = array(
			'id_fp' => '',
			'fecha' => $fecha, 
			'mes' => $mes,
			'motivo' => $motivo,
			'destino' => $destino
		);


		if ($this->Formularios_model->save($data)) {
			redirect(base_url()."formularios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/productos/add");
		}
	}

	public function edit($id){
		$data =array( 
			"producto" => $this->Productos_model->getProducto($id),
			"categorias" => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproducto = $this->input->post("idproducto");
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$precio = $this->input->post("precio");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");
		$data  = array(
			'codigo' => $codigo, 
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'stock' => $stock,
			'categoria_id' => $categoria,
		);
		if ($this->Productos_model->update($idproducto,$data)) {
			redirect(base_url()."mantenimiento/productos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/productos/edit/".$idproducto);
		}
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}


	/////////////////////FORMULACIO DE PEDIDO /////////////////////////////
	public function listar_pedido($id_form_pedido){
		$data =array( 
			"fpedidos" => $this->Formularios_model->get_list_form_Pedidos($id_form_pedido),
			"id_form" => $id_form_pedido,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fpedido/list_productos_pedido",$data);
		$this->load->view("layouts/footer");
	}
	public function add_producto_fpedido($id_form){
		$data =array( 
			"id_form" => $id_form,
			"productos" =>$this->Productos_model->getProductos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fpedido/add_producto_fpedido",$data);
		$this->load->view("layouts/footer");
	}
	public function guardar_producto(){
		$id_fp = $this->input->post("id_fp");
		$cantidad = $this->input->post("cantidad");
		$unidad = $this->input->post("unidad");
		$id_producto = $this->input->post("id_producto");
		$observacion = $this->input->post("observacion");
		$data  = array(
			'id_fp' => $id_fp,
			'cantidad' => $cantidad, 
			'unidad' => $unidad,
			'id_producto' => $id_producto,
			'observacion' => $observacion
		);

		if ($this->Formularios_model->save_pedido($data)) {
			redirect(base_url()."formularios/listar_pedido/".$id_fp);
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."formularios/listar_pedido/<?php echo $id_fp;?>");
		}
	}


	/////////////////////FORMULACIO ENTRREGA DEL PRODUCTO///////////////////////////
	public function list_entrega_eco(){
		$data =array( 
			"actas" => $this->Formularios_model->get_actas_entrega_eco(),
			//"id_form" => $id_form_pedido,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fentrega_economo/list",$data);
		$this->load->view("layouts/footer");
	}

		public function add_acta_entrega_eco(){
		$data =array( 
			"pedidos" =>$this->Formularios_model->getPedidos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fentrega_economo/add",$data);
		$this->load->view("layouts/footer");
	}
	public function guardar_acta_entrega_eco(){
		
		$id_fp = $this->input->post("id_fp");
		
		$fecha = $this->input->post("fecha");
		
		$data  = array(
			'fecha' => $fecha, 
			'id_pedido' => $id_fp,
			
		);
		
		if ($this->Formularios_model->save_acta_entrega_eco($data)) {
			redirect(base_url()."formularios/list_entrega_eco/");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."formularios/listar_pedido/<?php echo $id_fp;?>");
		}
	}
	//////////////FORMULARIO RECEPCION DEL PRODUCTO///////////////////
	public function list_recepcion_prod(){
		$data =array( 
			"actas" => $this->Formularios_model->get_actas_recepcion_prod(),
			//"id_form" => $id_form_pedido,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/frecepcion_producto/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add_acta_recepcion_prod(){
		$data =array( 
			"pedidos" =>$this->Formularios_model->getPedidos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/frecepcion_producto/add",$data);
		$this->load->view("layouts/footer");
	}
	public function guardar_acta_recepcion_prod(){
		$id_fp = $this->input->post("id_fp");
		$fecha = $this->input->post("fecha");
		$data  = array(
			'fecha' => $fecha, 
			'id_pedido' => $id_fp,
			
		);
		if ($this->Formularios_model->save_acta_recepcion_prod($data)) {
			redirect(base_url()."formularios/list_recepcion_prod/");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
		}
	}
	//////////////FORMULARIO ACTA ENTREGA A LA COCINA///////////////////
	public function list_entrega_cocina(){
		$data =array( 
			"actas" => $this->Formularios_model->get_actas_entrega_prod_cocina(),
			//"id_form" => $id_form_pedido,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fentrega_cocina/list",$data);
		$this->load->view("layouts/footer");
	}
	
	public function add_acta_entrega_cocina(){
		$data =array( 
			"pedidos" =>$this->Formularios_model->getPedidos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/formularios/fentrega_cocina/add",$data);
		$this->load->view("layouts/footer");
	}
	public function guardar_acta_entrega_cocina(){
		$id_fp = $this->input->post("id_fp");
		$fecha = $this->input->post("fecha");
		$data  = array(
			'fecha' => $fecha, 
			'id_pedido' => $id_fp,
			
		);
		if ($this->Formularios_model->save_acta_entrega_prod_cocina($data)) {
			redirect(base_url()."formularios/list_entrega_cocina/");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
		}
	}
	

}