<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
	}

	public function index()
	{
		$data  = array(
			'productos' => $this->Productos_model->getProductos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
	
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$id_producto = $this->input->post("id_producto");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");

		$data  = array(
			//'id_producto' => $id_producto, 
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'stock' => $stock,
			//'categoria' => $categoria
		);

		if ($this->Productos_model->save($data)) {
			redirect(base_url()."mantenimiento/productos");
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

}