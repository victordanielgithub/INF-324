<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Proveedor_model");
	}

	public function index()
	{
		$data  = array(
			'proveedor' => $this->Proveedor_model->getProveedors(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedor/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedor/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci_prov = $this->input->post("ci_prov");
		$apellido = $this->input->post("apellido");
		$nombre = $this->input->post("nombre");
		$telefono = $this->input->post("telefono");
		$data  = array(
			'ci_prov' => $ci_prov,
			'apellido' => $apellido,
			'nombre' => $nombre,
			'telefono' => $telefono,
			'estado' => "1"
		);

		if ($this->Proveedor_model->save($data)) {
			redirect(base_url()."mantenimiento/proveedor");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/proveedor/add");
		}
	}

	public function edit($ci_prov){
		$data  = array(
			'proveedor' => $this->Proveedor_model->getProveedor($ci_prov), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedor/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$ci_prov = $this->input->post("ci_prov");
		$apellido = $this->input->post("apellido");
		$nombre = $this->input->post("nombre");
		$telefono = $this->input->post("telefono");
		$estado = $this->input->post("estado");
		$data  = array(
			'ci_prov' => $ci_prov,
			'apellido' => $apellido,
			'nombre' => $nombre,
			'telefono' => $telefono,
			'estado' => $estado
		);

		if ($this->Proveedor_model->update($ci_prov,$data)) {
			redirect(base_url()."mantenimiento/proveedor");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/proveedor/edit/".$ci_prov);
		}
	}

	public function delete($ci_prov){
		$data  = array(
			'estado' => "0", 
		);
		$this->Proveedor_model->update($ci_prov,$data);
		echo "mantenimiento/Proveedor";
	}
}