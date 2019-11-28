<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cocinero extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Cocinero_model");
	}

	public function index()
	{
		$data  = array(
			'Cocinero' => $this->Cocinero_model->getCocineros(), 
		);
		//$rep=$this->Usuarios_model->getUsuarios();
		//$datos['usuarios']=$rep;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Cocinero/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Cocinero/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$ci_coci = $this->input->post("ci_coci");
		$apellidos = $this->input->post("apellidos");
		$nombres = $this->input->post("nombres");

		$cargo = $this->input->post("cargo");
		$data  = array(
			'ci_coci' => $ci_coci,
			'apellido' => $apellidos,
			'nombre' => $nombres,
			'cargo' => $cargo,
			'estado' => "1"
			
		);

		if ($this->Cocinero_model->save($data)) {
			redirect(base_url()."mantenimiento/cocinero");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/clientes/add");
		}
	}

	public function edit($ci_coci){
		$data  = array(
			'cocinero' => $this->Cocinero_model->getCocinero($ci_coci), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cocinero/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$ci_coci = $this->input->post("ci_coci");
		$apellidos = $this->input->post("apellido");
		$nombres = $this->input->post("nombre");
		
		$cargo = $this->input->post("cargo");
		
		$estado = $this->input->post("estado");
		$data  = array(
			'ci_coci' => $ci_coci,
			'apellido' => $apellidos,
			'nombre' => $nombres,
			'cargo' => $cargo,
			'estado' => $estado
		);

		if ($this->Cocinero_model->update($ci_coci,$data)) {
			redirect(base_url()."mantenimiento/cocinero");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/cocinero/edit/".$ci_coci);
		}
	}

	public function delete($ci_coci){
		$data  = array(
			'estado' => "0", 
		);
		$this->Cocinero_model->update($ci_coci,$data);
		echo "mantenimiento/cocinero";
	}
}